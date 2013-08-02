<?php
namespace Annotatecms\Debugger;

class Debugger {

    private static $panels = array(
        "routing" => "Annotatecms\\Debugger\\Panels\\RoutingPanel",
        "database" => "Annotatecms\\Debugger\\Panels\\DatabasePanel",
    );

    public static function register() {

        $config = \Config::get("debugger::debugger");

        if ($config["enabled"]) {
            $mode = $config["mode"];
            $logDirectory = $config["logDirectory"];
            $email = $config["email"];
            $panels = $config["panels"];

            \Tracy\Debugger::enable($mode, $logDirectory, $email);
            \Tracy\Debugger::$strictMode = TRUE;

            $bar = \Tracy\Debugger::getBar();

            foreach ($panels as $panelClass) {
                if(!class_exists($panelClass) && isset(self::$panels[$panelClass])) {
                    $panelClass = self::$panels[$panelClass];
                }
                $bar->addPanel(new $panelClass);
            }
        }

    }

}