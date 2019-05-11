<?php

namespace Webflorist\Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Webflorist\RouteTree\RouteTree;

class CmsServiceProvider extends ServiceProvider
{

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
            return new CmsService(
                app(RouteTree::class)
            );
        });

    }

    /**
     * Bootstrap the application services.
     * @param BladeCompiler $blade
     */
    public function boot(BladeCompiler $blade)
    {

        // Publish the config.
        $this->publishes([
            __DIR__.'/config/cms.php' => config_path('cms.php'),
        ]);

        // Load default translations.
        $this->loadTranslationsFrom(__DIR__ . "/resources/lang","Webflorist-Cms");

        $blade->directive('cmscontent', function ($marker='default') {
            return "<?php echo cms()->getPageContent($marker); ?>";
        });
	
    }

}