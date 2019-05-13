<?php

namespace Webflorist\Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Webflorist\HtmlFactory\HtmlFactory;
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
     *
     * @param BladeCompiler $blade
     * @param HtmlFactory $htmlFactory
     * @throws \Webflorist\HtmlFactory\Exceptions\DecoratorNotFoundException
     */
    public function boot(BladeCompiler $blade, HtmlFactory $htmlFactory)
    {

        // Publish the config.
        $this->publishes([
            __DIR__.'/config/cms.php' => config_path('cms.php'),
        ]);

        // Load default translations.
        $this->loadTranslationsFrom(__DIR__ . "/resources/lang","Webflorist-Cms");

        // Load views.
        $this->loadViewsFrom(__DIR__.'/views', 'cms');

        // Set Blade directives
        $blade->directive('cmscontent', function ($marker='default') {
            return "<?php echo cms()->getPageContent($marker); ?>";
        });
	
        // Register included decorators.
        /*
        $htmlFactory->decorators->registerFromFolder(
            'Webflorist\Cms\Decorators\Bootstrap\v4',
            __DIR__.'/Decorators/Bootstrap/v4'
        );
        */
	
    }

}