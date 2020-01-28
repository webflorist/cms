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
 * @property string $target             target of Link
 * @property string $title              title of Link
 * @property string $node               RouteNode-ID (to automatically get href and title)
 *
 * Setters for default properties:
 * ===============================
 * @method   CmsLinkPayload             href(string $href)
 * @method   CmsLinkPayload             target(string $target)
 * @method   CmsLinkPayload             title(string $title)
 * @method   CmsLinkPayload             node(string $nodeId)
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
     * @return $this
     */
    public function getHref()
    {
        if ($this->has('href')) {
            return $this->href;
        }

        if ($this->has('node')) {
            return (string) route_node($this->node)->getUrl();
        }
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
}
