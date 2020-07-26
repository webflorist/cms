<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Payload\CmsLinkPayload;
use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\AElement;

class LinkComponent extends AElement
{
    use CmsComponent;

    protected $anchor;

    /**
     * LinkComponent constructor.
     */
    public function __construct(?CmsLinkPayload $linkPayload = null)
    {
        parent::__construct();
        $this->overrideName('a');
        if ($linkPayload instanceof CmsLinkPayload) {
            $this->payload = $linkPayload;
        }
    }

    protected function setUp()
    {
        $this->setUpCmsComponent();
    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();

        if (isset($this->payload->href)) {
            $this->href($this->payload->href);
        }

        if (isset($this->payload->target)) {
            $this->target($this->payload->target);
        }

        if (!$this->content->hasContent() && isset($this->payload->title)) {
            $this->content($this->payload->title);
        }

        if (isset($this->anchor)) {
            $this->href($this->attributes->href . "#" . $this->anchor);
        }
    }

    protected function afterDecoration()
    {
        parent::afterDecoration();

        if (!$this->content->hasContent()) {
            $this->content($this->attributes->href);
        }

        if (!$this->attributes->isSet('title')) {
            $this->title($this->generateContent());
        }
    }

    public function toRouteNode(?string $nodeId = null, ?array $parameters = null, ?string $locale = null, ?bool $absolute = null)
    {
        $routeNode = route_node($nodeId);
        $this->href($routeNode->getUrl($parameters, $locale, $absolute)->generate());
        $this->title($routeNode->getTitle($parameters, $locale));
        $this->hreflang($locale ?? app()->getLocale());
        return $this;
    }

    public function anchor(string $anchor)
    {
        $this->anchor = $anchor;
        return $this;
    }

}
