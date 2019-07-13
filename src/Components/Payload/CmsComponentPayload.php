<?php

namespace Webflorist\Cms\Components\Payload;

use Webflorist\HtmlFactory\Payload\Abstracts\Payload;
use Webflorist\IconFactory\Payload\IconPayload;

class CmsComponentPayload extends Payload
{
    /**
     * Array of items
     * (e.g. for a ListComponent).
     *
     * @var array
     */
    public $items;

    /**
     * Array of default-values
     * for items.
     *
     * @var array
     */
    public $itemDefaults;

    /**
     * Title of component.
     *
     * @var string|CmsComponentPayload
     */
    public $title;

    /**
     * Text or HTML content
     * of component.
     *
     * @var string
     */
    public $content;

    /**
     * Is $this->content
     * HTML or not.
     *
     * @var boolean
     */
    public $isHtmlContent = false;

    /**
     * Icon of component.
     *
     * @var string|IconPayload
     */
    public $icon;

    /**
     * Html-classes to apply to this component.
     *
     * @var string[]
     */
    public $classes;

    public function items(array $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param string|IconPayload $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function content(string $content)
    {
        $this->content = $content;
        return $this;
    }

}