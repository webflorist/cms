<?php

namespace Webflorist\Cms\Components\Payload;

use Webflorist\HtmlFactory\Payload\Abstracts\Payload;
use Webflorist\IconFactory\Payload\IconPayload;


/**
 * Payload for any CmsComponents.
 *
 * Class CmsComponentPayload
 * @package Webflorist\Cms
 *
 * Default properties:
 * ===================
 * @property array                      $items              Array of items (e.g. for a ListComponent)
 * @property array                      $itemDefaults       Array of default-values for items.
 * @property string                     $tag                Tag to use for the root HTML-element.
 * @property string|CmsComponentPayload $title              Title of component.
 * @property boolean                    $isHtmlTitle        Should $this->title be rendered as HTML or not (default=false).
 * @property string                     $content            Text or HTML content of component.
 * @property boolean                    $isHtmlContent      Should $this->content be rendered as HTML or not (default=false).
 * @property CmsComponentPayload        $heading            Payload to use for heading-sub-component.
 * @property string|IconPayload         $icon               Icon of component.
 * @property string|LinkPayload         $link               Main Link of component.
 * @property string[]                   $classes            Html-classes to apply to this component.
 * @property string                     $id                 Html-id to apply to this component.
 *
 * Setters for default properties:
 * ===============================
 * @method   $this                      items(array $items)
 * @method   $this                      itemDefaults(array $itemDefaults)
 * @method   $this                      tag(string $tag)
 * @method   $this                      title(mixed $title)
 * @method   $this                      isHtmlTitle(bool $isHtmlTitle)
 * @method   $this                      content(string $content)
 * @method   $this                      isHtmlContent(bool $isHtmlContent)
 * @method   $this                      heading(CmsComponentPayload $headingPayload)
 * @method   $this                      icon(mixed $title)
 * @method   $this                      link(LinkPayload $linkPayload)
 * @method   $this                      classes(string[] $classes)
 * @method   $this                      id(string $id)
 *
 */
class CmsComponentPayload extends Payload
{



}
