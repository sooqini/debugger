<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com>
 */

namespace Annotatecms\Debugger\Panels;

use Tracy\IBarPanel;

abstract class AbstractPanel implements IBarPanel {

    protected static $counter = 0;

    public function getTab() {
        return $this->renderFile($this->getTemplatesPath() . "/tab.php");
    }

    protected function renderFile($path) {
        ob_start();
        require $path;

        return ob_get_clean();
    }

    /**
     * Returns path to tab.php and panel.php files.
     *
     * @return string
     */
    abstract function getTemplatesPath();

    public function getPanel() {
        return $this->renderFile($this->getTemplatesPath() . "/panel.php");
    }

}