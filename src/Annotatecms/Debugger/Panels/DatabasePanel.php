<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com>
 */

namespace Annotatecms\Debugger\Panels;

class DatabasePanel extends AbstractPanel {

    protected $queries = array();
    protected $totalTime = 0;
    protected $connectionsCount = 1;
    protected $connections = array();

    function __construct() {
        $this->registerListener();
        $this->connectionsCount = count($this->connections);
    }

    private function registerListener() {
        \DB::listen(function ($query, $bindings, $time, $name) {
            $this->queries[] = (object) array(
                "query" => $query,
                "time" => $time,
                "bindings" => $bindings,
                "name" => $name,
            );
            $this->connections[$name] = 1;
            $this->totalTime += $time;
        });
    }

    function getTemplatesPath() {
        return __DIR__ . "/templates/database";
    }

    public function getTab() {
        if(count($this->queries)) {
            return parent::getTab();
        }
    }

}