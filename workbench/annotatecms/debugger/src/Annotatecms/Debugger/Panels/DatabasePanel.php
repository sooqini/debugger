<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com>
 */

namespace Annotatecms\Debugger\Panels;

class DatabasePanel extends AbstractPanel {

    protected $queries;
    protected $totalTime = 0;
    protected $connectionsCount = 1;
    protected $connections = array();

    function __construct() {
        \DB::listen(function ($query, $bindings, $time, $name) {
            $this->queries[] = (object)array(
                "query" => $this->formatQuery($query, $bindings),
                "time" => $time,
                "bindings" => $bindings,
                "name" => $name,
            );
            $this->connections[$name] = 1;
            $this->totalTime += $time;
        });
        $this->connectionsCount = count($this->connections);
    }

    private function formatQuery($query, $bindings) {
        $i = 0;
        while (($pos = strpos($query, " ?")) !== FALSE) {
            $query = substr_replace($query, " <b style='cursor: help;' title='" . $bindings[$i] . "'>?</b>", $pos, 2);
            $i++;
        }

        return $query;
    }

    /**
     * Renders HTML code for custom tab.
     *
     * @return string
     */
    function getTab() {
        return $this->renderFile(__DIR__ . "/templates/database/tab.php");
    }

    /**
     * Renders HTML code for custom panel.
     *
     * @return string
     */
    function getPanel() {
        return $this->renderFile(__DIR__ . "/templates/database/panel.php");
    }

}