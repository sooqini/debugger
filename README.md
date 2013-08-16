
# AnnotateCms Debugger #
[![Total Downloads](https://poser.pugx.org/annotatecms/debugger/version.png)](https://packagist.org/packages/annotatecms/debugger) [![Total Downloads](https://poser.pugx.org/annotatecms/debugger/downloads.png)](https://packagist.org/packages/annotatecms/debugger)

AnnotateCms debugger is integration of [Tracy](https://github.com/nette/tracy "Tracy Github page") into Laravel Framework. It replaces the [Whoops](http://filp.github.io/whoops/).

## Installation ##

### Via rtablada/package-installer ###
Since version 2.0.6 you can use [rtablada/package-installer](https://github.com/rtablada/package-installer):

	artisan package:install annotatecms/debugger

### Via composer ###
Install via composer into Laravel Framework's project. Add this into your composer.json file:	

	"annotatecms/debugger" : "2.*"

After updating composer, add the ServiceProvider to the providers array in app/config/app.php

	'Annotatecms\Debugger\DebuggerServiceProvider',

You can add alias to Debugger service to app/config/app.php:
	'Debugger' => 'Annotatecms\Debugger\Facades\Debugger'

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
- panels - list of provided panels you want to embed into panel 

## Provided panels ##
With this panels you can use only panel name in panels list. For example:
	
	"panels" => array(
		"routing"
	)

List of panels:

- routing - display routes and theirs method, path and parameters. Current route is marked as bold
- database - display queries with their times and bindings

## Creating panel ##
Since version 2.1 Debugger is registered as service. You can easily add new panel via **addPanel** method:
	
	\Debugger::addPanel(function(){
		return new MyAwesomePanel();
	})

**addPanel** method accepts factory function as parameter. Thanks to this method you do not have to add panels into config file. You can add panels from your package (typically in service provider class).

Panel class must extend **AbstractPanel** class. You have to implement only one method which returns path to templates for panel:

	function getTemplatesPath() {
        return __DIR__ . "/templates";
    }
	

### Panel templates ###
Panel templates are plain php files. File tab.php renders panel's tab. Typically some icon and name of panel. File panel.php renders panel's content. You can use css classes provided by tracy package. For example see [routing/panel.php](src/Annotatecms/Debugger/Panels/templates/routing/panel.php) and [routing/tab.php](src/Annotatecms/Debugger/Panels/templates/database/tab.php) 

## Screenhosts ##
![Bar panel](https://dl.dropboxusercontent.com/u/78644957/debugger/bar.png)
![Caught exception](https://dl.dropboxusercontent.com/u/78644957/debugger/exception.png)
![Routing panel](https://dl.dropboxusercontent.com/u/78644957/debugger/routing_panel.png)