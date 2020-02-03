<?php

namespace MalaveHaxiel\JScript;

use Illuminate\Support\ServiceProvider;

class JScriptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('jscript', function() {
            return new ScriptBuilder;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
