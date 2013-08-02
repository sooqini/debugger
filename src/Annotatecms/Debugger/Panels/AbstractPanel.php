<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com> 
 */

namespace Annotatecms\Debugger\Panels;


use Tracy\IBarPanel;

abstract class AbstractPanel implements IBarPanel {

    protected static $counter = 0;

    protected function renderFile($path) {
        ob_start();
        require $path;
        return ob_get_clean();
    }

}