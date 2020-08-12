<?php

namespace Webflorist\Cms\Adapters;

use Illuminate\Support\Str;
use Sanity\BlockContent;
use Sanity\Client;
use Webflorist\Cms\Adapters\Abstracts\CmsAdapter;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\Cms\Components\Payload\CmsLinkPayload;
use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Payload\Abstracts\Payload;
use Webflorist\RouteTree\RouteNode;

class SanityCmsAdapter extends CmsAdapter
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * SanityCmsAdapter constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'projectId' => config('cms.services.sanity.project_id'),
            'dataset' => config('cms.services.sanity.dataset'),
            'apiVersion' => config('cms.services.sanity.api_version'),
            'useCdn' => config('cms.services.sanity.use_cdn')
        ]);
    }

    protected function fetch(string $query, ?array $params = [])
    {
        $cacheKey = $query . implode(' ', $params);
        $cacheTtl = config('cms.services.sanity.cache_ttl');
        $cacheClosure = function () use ($query, $params) {
            return $this->client->fetch($query, $params);
        };

        if ($cacheTtl > 0) {
            return cache()->remember(
                $cacheKey,
                $cacheTtl,
                $cacheClosure
            );
        }

        // For non-caching, we use the array-store
        // to cache at least per request.
        return cache()->store('array')->rememberForever(
            $cacheKey,
            $cacheClosure
        );
    }

    public function getResource(string $resourceId): array
    {
        if (Str::isUuid($resourceId)) {
            return $this->client->getDocument($resourceId);
        }

        return $this->fetch("*[_id == '$resourceId' || id.current == '$resourceId']")[0];
    }

    public function getPageComponents(string $node): array
    {
        $pageContent = [];

        $pageId = $this->fetch(
            '*[_type=="page" && node==$node]',
            [
                'node' => $node
            ]
        )[0]['_id'];

        $resources = $this->fetch(
            '*[page._ref==$pageId] | order(order asc)',
            [
                'pageId' => $pageId
            ]
        );

        foreach ($resources as $resourceData) {
            if (!($resourceData['hidden'] ?? false)) {
                $pageContent[$resourceData['id']['current']] = $this->mapResourceToComponent($resourceData);
            }
        }
        return $pageContent;
    }

    public function setUpRouteNode(RouteNode $node): void
    {
        $nodeId = $node->hasParentNode() ? $node->getId() : 'home';

        $pageData = $this->fetch(
            '*[_type=="page" && node==$node]',
            [
                'node' => $nodeId
            ]
        )[0];

        $node->payload->title = $pageData['title'];

        if (isset($pageData['navTitle'])) {
            $node->payload->navTitle = $pageData['navTitle'];
        }

        if (isset($pageData['showSubtitleInHead'])) {
            $node->payload->showSubtitleInHead = $pageData['showSubtitleInHead'];
        }

        if (isset($pageData['description'])) {
            $node->payload->description = $pageData['description'];
        }

        if (isset($pageData['subtitle'])) {
            $node->payload->subtitle = $pageData['subtitle'];
        }

        if (isset($pageData['icon'])) {
            $node->payload->icon = $pageData['icon'];
        }
    }


    public function mapResourceToComponent(array $resourceData): Element
    {
        /** @var CmsComponent $component */
        $component = cms()->create()->{$resourceData['_type']}();

        $component->payload($this->mapResourceToPayload($resourceData));

        return $component;
    }

    public function mapResourceToPayload(array $resourceData): Payload
    {

        if ($resourceData['_type'] === 'externalLink') {
            return new CmsLinkPayload($resourceData);
        }

        if ($resourceData['_type'] === 'internalLink') {
            return $this->createInternalLinkPayload($resourceData);
        }

        if ($resourceData['_type'] === 'feature') {
            if (isset($resourceData['reference']['_ref'])) {
                $resourceData['node'] = $this->getResource($resourceData['reference']['_ref'])['node'];
            }
            if (isset($resourceData['link'])) {
                $resourceData['link'] = $this->createInternalLinkPayload($resourceData['link']);
            }
            return new CmsComponentPayload($resourceData);
        }

        if ($resourceData['_type'] === 'menuItem') {
            if (isset($resourceData['content'])) {
                $resourceData['content'] = self::toHtml(
                    $resourceData['content'],
                    true,
                    $resourceData['heading']['tag'] ?? 'h3'
                );
            }
            if (isset($resourceData['reference']['_ref'])) {
                $resourceData = array_merge($resourceData, $this->getResource($resourceData['reference']['_ref']));
            }
            return new CmsComponentPayload($resourceData);
        }

        $payload = new CmsComponentPayload();

        if (isset($resourceData['heading'])) {
            $payload->heading(new CmsComponentPayload($resourceData['heading']));
            unset($resourceData['heading']);
        }

        if (isset($resourceData['id'])) {
            $payload->id($resourceData['id']['current']);
            unset($resourceData['id']);
        }

        if (isset($resourceData['items'])) {
            $itemPayloads = [];

            foreach ($resourceData['items'] as $itemData) {
                $itemPayloads[] = $this->mapResourceToPayload($itemData);
            }

            $payload->items($itemPayloads);
            unset($resourceData['items']);
        }

        if (isset($resourceData['icon'])) {
            $payload->icon($resourceData['icon']);
        }

        if (isset($resourceData['text'])) {
            $payload->content(
                $this->toHtml($resourceData['text'], true, $payload->heading->tag)
            );
            unset($resourceData['text']);
        }

        foreach ($resourceData as $remainingItemKey => $remainingItemValue) {
            $payload->{$remainingItemKey} = $remainingItemValue;
        }

        return $payload;
    }

    protected function getPageOfContent(string $contentId): array
    {
        return $this->fetch("*[_id == '$contentId']{page->{...}}")[0]['page'];
    }

    protected function toHtml(array $content, bool $wrapBlock = true, ?string $parentHeading='h3'): string
    {
        $parentHeadingLevel = intval(substr($parentHeading, 1));
        $childHeading = 'h'.($parentHeadingLevel+1);
        return BlockContent::toHtml($content, [
            'projectId' => config('cms.services.sanity.project_id'),
            'dataset' => config('cms.services.sanity.dataset'),
            'serializers' => [
                'block' => function ($block) use ($wrapBlock, $content, $childHeading) {
                    $return = implode('', $block['children']);
                    if ($wrapBlock && (strlen($return) > 0)) {
                        if ($block['style'] === 'h4') {
                            $block['style'] = $childHeading;
                        }
                        $tag = $block['style'] === 'normal' ? 'p' : $block['style'];
                        $return = '<' . $tag . '>' . $return . '</' . $tag . '>';
                    }
                    return $return;
                },
                'list' => function ($list, $parent, $htmlBuilder) {
                    $items = [];
                    foreach ($list['items'] as $item) {
                        $items[] = (new CmsComponentPayload())
                            ->content($this->toHtml($item, false))
                            ->isHtmlContent(true);
                    }
                    $style = isset($list['itemStyle']) ? $list['itemStyle'] : 'default';
                    $tagName = $style === 'number' ? 'ol' : 'ul';
                    $list = cms()->create()->list($tagName)->payload((new CmsComponentPayload())
                        ->items($items)
                        ->itemDefaults([
                            'icon' => 'fas fa-circle'
                        ])
                    );
                    return $list->generate();
                },
                'externalLink' => function ($link) {
                    $component = cms()->create()->link()->href($link['attributes']['href']);

                    if ($link['attributes']['targetBlank'] ?? false) {
                        $component->targetBlank();
                    }
                    return $component->generate();
                },
                'marks' => [
                    'externalLink' => [
                        'head' => function ($mark) {
                            return '<a href="' . $mark['href'] . '">';
                        },
                        'tail' => '</a>'
                    ],
                    'internalLink' => [
                        'head' => function ($mark) {

                            if (!isset($mark['reference'])) {
                                return;
                            }

                            $link = cms()->create()->link();
                            $linkedResource = $this->getResource($mark['reference']['_ref']);

                            if ($mark['blank'] ?? false) {
                                $link->targetBlank();
                            }

                            if ($linkedResource['_type'] === 'contactData') {
                                $link->anchor('kontakt');
                            } else {
                                $page = $linkedResource;

                                if ($linkedResource['_type'] !== 'page') {
                                    $page = $this->getPageOfContent($mark['reference']['_ref']);
                                }

                                $link->toRouteNode(
                                    ($page['node'] === 'home') ? '' : $page['node']
                                );

                                if ($linkedResource['_type'] !== 'page') {

                                    if ($page['node'] === route_node()->getId()) {
                                        $link->href('');
                                    }

                                    $link->title($link->attributes->title . ': ' . $linkedResource['heading']['title']);
                                    $link->anchor($linkedResource['id']['current']);
                                }
                            }

                            $link->generate();
                            return $link->renderStartTag();
                        },
                        'tail' => function ($mark) {

                            if (!isset($mark['reference'])) {
                                return;
                            }
                            return '</a>';
                        }
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param array $resourceData
     * @return CmsLinkPayload
     */
    private function createInternalLinkPayload(array $resourceData): CmsLinkPayload
    {
        $linkPayload = new CmsLinkPayload();
        $linkedResource = $this->getResource($resourceData['reference']['_ref']);

        if ($resourceData['blank'] ?? false) {
            $linkPayload->targetBlank();
        }

        if ($linkedResource['_type'] === 'contactData') {
            $linkPayload->href('#kontakt');
        } else {
            $page = $linkedResource;

            if ($linkedResource['_type'] !== 'page') {
                $page = $this->getPageOfContent($linkedResource['_id']);
            }

            $linkPayload->toRouteNode(
                ($page['node'] === 'home') ? '' : $page['node']
            );

            if ($linkedResource['_type'] !== 'page') {

                // If linked to current page, we remove the href, so only the anchor is set.
                if ($page['node'] === route_node()->getId()) {
                    $linkPayload->href('');
                }

                $linkPayload->title($linkPayload->title . ': ' . $linkedResource['heading']['title']);
                $linkPayload->anchor($linkedResource['id']['current']);
            }
        }
        return $linkPayload;
    }
}
