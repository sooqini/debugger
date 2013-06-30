<?php
namespace Annotatecms\Debugger;

class Debugger {

    public static function register() {

        $config = \Config::get("debugger::debugger");

        if ($config["enabled"]) {
            $mode = $config["mode"];
            $logDirectory = $config["logDirectory"];
            $email = $config["email"];
            $panels = $config["panels"];
            \Nette\Diagnostics\Debugger::enable($mode, $logDirectory, $email);

            foreach ($panels as $panelClass) {
                \Nette\Diagnostics\Debugger::addPanel(new $panelClass);
            }
        }

    }

}