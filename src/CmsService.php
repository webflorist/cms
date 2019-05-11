<?php

namespace Webflorist\Cms;

use Exception;
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
     * CmsService constructor.
     * @param RouteTree $routeTree
     */
    public function __construct(RouteTree $routeTree)
    {
        $this->routeTree = $routeTree;
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
        $html = '';

        $pageContent = include resource_path("cmscontent/$nodeId.php");

        if (!isset($pageContent[$marker])) {
            throw new Exception("Content of Page with node-ID '$nodeId' does not contain a marker named '$marker'.");
        }

        foreach ($pageContent[$marker] as $section) {


            foreach ($section['data'] as $dataKey => $dataValue) {
                if (is_string($dataValue) && substr($dataValue, -5) === '.html') {
                    $section['data'][$dataKey] = file_get_contents(resource_path("cmscontent/$nodeId/$dataValue"));

                }
            }
            $html .= $this->renderSection($section['section'], $section['data']);
        }

        return $html;
    }

    private function renderSection(string $section, array $data): string
    {
        return view("sections.$section", $data);
    }

}
