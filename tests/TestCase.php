<?php

namespace CmsTests;

use HtmlFactoryTests\Traits\AssertsHtml;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Webflorist\Cms\CmsServiceProvider;
use Webflorist\HtmlFactory\HtmlFactoryFacade;
use Webflorist\HtmlFactory\HtmlFactoryServiceProvider;
use Webflorist\RouteTree\RouteTreeServiceProvider;

/**
 * Class TestCase
 * @package HtmlFactoryTests
 */
class TestCase extends BaseTestCase
{

    use AssertsHtml;

    /**
     * Array of group-IDs of decorators, that should be loaded.
     *
     * @var string[]
     */
    protected $decorators = [];


    protected function getPackageProviders($app)
    {
        return [
	        HtmlFactoryServiceProvider::class,
            RouteTreeServiceProvider::class,
            CmsServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Html' => HtmlFactoryFacade::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('htmlfactory.decorators', $this->decorators);

    }

    protected function setDecorators(array $decorators)
    {
        $this->decorators = $decorators;
        $this->refreshApplication();
    }
}