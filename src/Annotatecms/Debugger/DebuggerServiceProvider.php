<?php namespace Annotatecms\Debugger;

use Illuminate\Support\ServiceProvider;

class DebuggerServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = FALSE;

    public function boot() {
        $this->package("annotatecms/debugger");
        Debugger::register();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

}