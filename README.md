
<!-- saved from url=(0060)https://raw.github.com/annotatecms/debugger/master/README.md -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css"></style></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;"># AnnotateCms Debugger #
[![Total Downloads](https://poser.pugx.org/annotatecms/debugger/version.png)](https://packagist.org/packages/annotatecms/debugger) [![Total Downloads](https://poser.pugx.org/annotatecms/debugger/downloads.png)](https://packagist.org/packages/annotatecms/debugger)

AnnotateCms debugger is integration of [Tracy](https://github.com/nette/tracy "Tracy Github page") into Laravel Framework. It replaces the [Whoops](http://filp.github.io/whoops/).

## Installation ##
Install via composer into Laravel Framework's project. Add this into your composer.json file:	

	"annotatecms/debugger" : "2.*"

After updating composer, add the ServiceProvider to the providers array in app/config/app.php

	'Annotatecms\Debugger\DebuggerServiceProvider',

Publish configuration via Artisan command:

	php artisan config:publish annotatecms/debugger

## Configuration ##

Configuration file is now in app/config/packages/annotatecms/debugger/debugger.php file.

- enabled - true/false - quickly enable/disable debugger
- mode 
	- NULL - detects environment automatically by host IP
	- development - forces to show debugger
	- production - forces to hide debugger
- logDirectory - directory to save debugger output. Debugger saves there exceptions reports as HTML files.
- email - debugger can send email to this address when error occurs on production
- panels - array of 'Tracy\IBarPanel' implementations to add into debugger panel 

## Provided panels ##
With this panels you can use only panel name in panels list. For example:
	
	"panels" =&gt; array(
		"routing"
	)

List of panels:

- routing - display routes and theirs method, path and parameters. Current route is marked as bold
- database - display queries with their times and bindings   
</pre></body></html>