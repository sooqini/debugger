<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com>
 */

namespace Annotatecms\Debugger\Panels;

class RoutingPanel extends AbstractPanel {

    /**
     * Returns path to tab.php and panel.php files.
     *
     * @return string
     */
    function getTemplatesPath() {
        return __DIR__ . "/templates/routing";
    }

}