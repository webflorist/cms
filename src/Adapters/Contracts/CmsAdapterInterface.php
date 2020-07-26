<?php

namespace Webflorist\Cms\Adapters\Contracts;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Payload\Abstracts\Payload;
use Webflorist\RouteTree\RouteNode;

interface CmsAdapterInterface
{

    public function getResource(string $resourceId) : array;

    /**
     * @param string $pageId
     * @return Element[]
     */
    public function getPageComponents(string $pageId) : array;

    public function mapResourceToComponent(array $resourceData) : Element;

    public function setUpRouteNode(RouteNode $node) : void;

}
