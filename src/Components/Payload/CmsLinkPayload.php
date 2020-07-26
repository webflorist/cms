<?php

namespace Webflorist\Cms\Components\Payload;

use Webflorist\HtmlFactory\Payload\Abstracts\Payload;

/**
 * Payload for a Link.
 *
 * Class CmsLinkPayload
 * @package Webflorist\Cms
 *
 * Default properties:
 * ===================
 * @property string $href               href of Link
 * @property string $hreflang           hreflang of Link
 * @property string $target             target of Link
 * @property string $title              title of Link
 * @property string $node               RouteNode-ID (to automatically get href and title)
 * @property string $anchor             anchor to append to href
 *
 * Setters for default properties:
 * ===============================
 * @method   CmsLinkPayload             href(string $href)
 * @method   CmsLinkPayload             hreflang(string $hreflang)
 * @method   CmsLinkPayload             target(string $target)
 * @method   CmsLinkPayload             title(string $title)
 * @method   CmsLinkPayload             node(string $nodeId)
 * @method   CmsLinkPayload             anchor(string $anchor)
 *
 */
class CmsLinkPayload extends Payload
{
    /**
     * Sets target to _blank.
     *
     * @return $this
     */
    public function targetBlank()
    {
        $this->target = '_blank';
        return $this;
    }

    /**
     * Returns href.
     * If $this->href is not set,
     * but $this->node is set,
     * href is taken from the node.
     *
     * @return string
     */
    public function getHref()
    {
        $href = '';

        if ($this->has('href')) {
            $href = $this->href;
        }

        if ($this->has('node')) {
            $href = (string)route_node($this->node)->getUrl();
        }

        if ($this->has('anchor')) {
            $href .= '#'.$this->anchor;
        }
        return $href;
    }

    /**
     * Returns title.
     * If $this->title is not set,
     * but $this->node is set,
     * title is taken from the node.
     *
     * @return string|null
     */
    public function getTitle()
    {
        if ($this->has('title')) {
            return $this->title;
        }

        if ($this->has('node')) {
            return route_node($this->node)->getTitle();
        }
    }

    /**
     * Is either $this->title or $this->node set?
     *
     * @return bool
     */
    public function hasTitle()
    {
        return $this->has('title') || $this->has('node');
    }

    public function toRouteNode(?string $nodeId = null, ?array $parameters = null, ?string $locale = null, ?bool $absolute = null)
    {
        $routeNode = route_node($nodeId);
        $this->href($routeNode->getUrl($parameters, $locale, $absolute)->generate());
        $this->title($routeNode->getTitle($parameters, $locale));
        $this->hreflang($locale ?? app()->getLocale());
        return $this;
    }
}
