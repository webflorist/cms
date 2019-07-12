<?php

namespace Webflorist\Cms;

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
        $this->mergeConfig();
        $this->registerService();
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->loadMigrations();
        $this->loadTranslations();
        $this->loadViews();
        $this->setBladeDirectives();
    }

    protected function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/cms.php', 'cms');
    }
    
    protected function registerService()
    {
        $this->app->singleton(CmsService::class, function()
        {
            return new CmsService(
                app(RouteTree::class)
            );
        });
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/config/cms.php' => config_path('cms.php'),
        ]);
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    private function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . "/resources/lang","Webflorist-Cms");
    }

    private function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'cms');
    }

    private function setBladeDirectives()
    {
        /** @var BladeCompiler $blade */
        $blade =  app(BladeCompiler::class);
        $blade->directive('cmscontent', function ($marker='default') {
            return "<?php echo cms()->getPageContent($marker); ?>";
        });
    }

}