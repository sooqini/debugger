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
		$message = preg_replace('#\s*\r?\n\s*#', ' ', trim($message));
		return Log::getMonolog()->log($priority, $message);
	}
} 