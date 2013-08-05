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
                "query" => $query,
                "time" => $time,
                "bindings" => $bindings,
                "name" => $name,
            );
            $this->connections[$name] = 1;
            $this->totalTime += $time;
        });
        $this->connectionsCount = count($this->connections);
    }

    /**
     * Renders HTML code for custom tab.
     *
     * @return string
     */
    function getTab() {
        if(count($this->queries)) {
            return $this->renderFile(__DIR__ . "/templates/database/tab.php");
        }
    }

    /**
     * Renders HTML code for custom panel.
     *
     * @return string
     */
    function getPanel() {
        if(count($this->queries)) {
            return $this->renderFile(__DIR__ . "/templates/database/panel.php");
        }
    }

}