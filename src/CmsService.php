<?php

namespace Webflorist\Cms;

use Exception;
use Webflorist\Cms\Components\Abstracts\Component;
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
     * @var CmsHtmlFactory
     */
    private $htmlFactory;


    /**
     * CmsService constructor.
     * @param RouteTree $routeTree
     */
    public function __construct(RouteTree $routeTree)
    {
        $this->routeTree = $routeTree;
        $this->htmlFactory = new CmsHtmlFactory();
    }

    public function getPageContent(string $marker = 'default'): string
    {
        $nodeId = $this->routeTree->getCurrentNode()->getId();

        if ($nodeId === '') {
            $nodeId = 'home';
        }

        return $this->getPageContentForNode($nodeId, $marker);
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

}
