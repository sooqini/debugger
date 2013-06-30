# AnnotateCms Debugger #

AnnotateCms debugger is integration of [Tracy](https://github.com/nette/tracy "Tracy Github page") into Laravel Framework. It replaces the [Whoops](http://filp.github.io/whoops/).

## Installation ##
Install via composer into Laravel Framework's project. Add this into your composer.json file:	

	"annotatecms/debugger" : "1.*"

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
- panels - array of 'Nette\Diagnostics\IBarPanel' implementations to add into debugger panel 