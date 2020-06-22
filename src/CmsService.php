<?php

namespace Webflorist\Cms;

use Exception;
use Webflorist\Cms\Adapters\Contracts\CmsAdapterInterface;
use Webflorist\Cms\Components\Factory\CmsComponentFactory;
use Webflorist\Cms\Components\Factory\CmsPayloadFactory;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\RouteTree\RouteTree;

class CmsService
{
    /**
     * The RouteTree Service
     *
     * @var RouteTree
     */
    private $routeTree;

    /**
     * @var CmsComponentFactory
     */
    private $componentFactory;

    /**
     * @var CmsPayloadFactory
     */
    private $payloadFactory;

    /**
     * @var CmsAdapterInterface
     */
    public $adapter;

    /**
     * CmsService constructor.
     * @param RouteTree $routeTree
     */
    public function __construct(RouteTree $routeTree)
    {
        $this->routeTree = $routeTree;
        $this->componentFactory = new CmsComponentFactory();
        $this->payloadFactory = new CmsPayloadFactory();
        $adapterClass = config('cms.adapter');
        $this->adapter = new $adapterClass();
    }

    public function generatePageContent(?\Closure $callback=null) {
        $pageComponents = $this->getPageComponents();
        if (is_callable($callback)) {
            $pageComponents = $callback($pageComponents);
        }
        return implode("\n", $pageComponents);
    }

    /**
     * @param string $marker
     * @return Element[]
     * @throws Exception
     */
    public function getPageComponents(): array
    {
        $nodeId = $this->routeTree->getCurrentNode()->getId();

        if ($nodeId === '') {
            $nodeId = 'home';
        }

        return $this->adapter->getPageComponents($nodeId);
    }

    /**
     * @param string $nodeId
     * @param string $marker
     * @return string
     * @throws Exception
     */
    public function getPageContentForNode(string $nodeId, string $marker = 'default'): string
    {

        $pageContent = include resource_path("cmscontent/$nodeId.php");

        if (!isset($pageContent[$marker])) {
            throw new Exception("Content of Page with node-ID '$nodeId' does not contain a marker named '$marker'.");
        }

        return implode($pageContent[$marker]);
    }

    /**
     * Returns ComponentFactory to create a component.
     *
     * @return CmsComponentFactory
     */
    public function create(): CmsComponentFactory
    {
        return $this->componentFactory;
    }

    /**
     * Returns PayloadFactory to create a payload.
     *
     * @return CmsPayloadFactory
     */
    public function payload(): CmsPayloadFactory
    {
        return $this->payloadFactory;
    }

}
