<?php

namespace Annotatecms\Debugger;

/*
 * This class sends log requests from Tracy to the Laravel monolog logger
 */
class Logger {

	public function log($message, $priority = NULL)
	{
		if (is_array($message)) {
			$message = implode(' ', $message);
		}


        /** Fix Priority to be PSR-3 Compliant */

        $levels = [
            'debug',
            'info',
            'notice',
            'warning',
            'error',
            'critical',
            'alert',
            'emergency'
        ];


        if(!in_array($priority, $levels) || !is_null($priority)) {
            $priority = 'error';
        }

        
		$message = preg_replace('#\s*\r?\n\s*#', ' ', trim($message));
		return \Log::getMonolog()->log($priority, $message);
	}
} 