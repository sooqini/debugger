<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com>
 */

namespace Annotatecms\Debugger\Panels;

use Illuminate\View\Compilers\BladeCompiler;
use Tracy\IBarPanel;

class RoutingPanel extends AbstractPanel {

    /**
     * Renders HTML code for custom tab.
     *
     * @return string
     */
    function getTab() {
        return $this->renderFile(__DIR__ . "/templates/routing/tab.php");
    }

    /**
     * Renders HTML code for custom panel.
     *
     * @return string
     */
    function getPanel() {
        return $this->renderFile(__DIR__ . "/templates/routing/panel.php");
    }

}