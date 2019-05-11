<?php

namespace Webflorist\Cms;

use Illuminate\Support\ServiceProvider;

class RouteTreeServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        // Publish the config.
        $this->publishes([
            __DIR__.'/config/cms.php' => config_path('cms.php'),
        ]);

        // Load default translations.
        $this->loadTranslationsFrom(__DIR__ . "/resources/lang","Webflorist-Cms");
	
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        // Merge the config.
        $this->mergeConfigFrom(__DIR__.'/config/cms.php', 'cms');

        // Register the CMS singleton.
        $this->app->singleton(CmsService::class, function()
        {
            return new CmsService();
        });

    }

}