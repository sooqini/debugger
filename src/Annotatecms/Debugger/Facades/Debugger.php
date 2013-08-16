<?php
/**
 * @author Michal Vyšinský <vysinsky@live.com> 
 */

namespace Annotatecms\Debugger\Facades;


use Illuminate\Support\Facades\Facade;

class Debugger extends Facade {

    protected static function getFacadeAccessor() {
        return "annotate.debugger";
    }

}