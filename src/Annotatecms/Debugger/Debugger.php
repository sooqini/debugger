<?php
namespace Annotatecms\Debugger;

use Nette\Diagnostics\Bar;

class Debugger {

    /**
     * @var Bar
     */
    private $bar;

    private static $alliases = array(
        "routing" => "Annotatecms\\Debugger\\Panels\\RoutingPanel",
        "database" => "Annotatecms\\Debugger\\Panels\\DatabasePanel",
    );

    function __construct() {
        $config = \Config::get("annotatecms/debugger::debugger");

        if ($config["enabled"]) {
            $mode = $config["mode"];
            $logDirectory = $config["logDirectory"];
            $email = $config["email"];
            $panels = $config["panels"];

            \Tracy\Debugger::enable($mode, $logDirectory, $email);
	        \Tracy\Debugger::$strictMode = TRUE;
	        \Tracy\Debugger::setLogger(new Logger());

            $this->bar = \Tracy\Debugger::getBar();

            foreach ($panels as $panelClass) {
                if (!class_exists($panelClass) && isset(self::$alliases[$panelClass])) {
                    $panelClass = self::$alliases[$panelClass];
                }
                $this->bar->addPanel(new $panelClass);
            }
        }
    }

    public function addPanel(callable $factory) {
        $this->bar->addPanel($factory());
    }

    public function log($message, $priority = \Tracy\Debugger::INFO) {
        \Tracy\Debugger::log($message, $priority);
    }

}