<?php namespace Annotatecms\Debugger;

use Annotatecms\Debugger\Panels\RoutingPanel;
use Illuminate\Support\ServiceProvider;

class DebuggerServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = FALSE;

    public function boot() {
        $this->package("annotatecms/debugger", "annotatecms/debugger");
        \App::make("annotate.debugger");
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app["annotate.debugger"] = $this->app->share(function ($app) {
            return new Debugger();
        });
    }

}