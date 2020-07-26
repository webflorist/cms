<?php

namespace Webflorist\Cms\Components\Payload;

use Webflorist\HtmlFactory\Payload\Abstracts\Payload;


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
 * @property string|CmsComponentPayload $subtitle           Subtitle of component.
 * @property boolean                    $isHtmlTitle        Should $this->title be rendered as HTML or not (default=false).
 * @property string                     $content            Text or HTML content of component.
 * @property boolean                    $isHtmlContent      Should $this->content be rendered as HTML or not (default=false).
 * @property CmsComponentPayload        $heading            Payload to use for heading-sub-component.
 * @property string                     $icon               Icon of component.
 * @property string|CmsLinkPayload      $link               Main Link of component.
 * @property string[]                   $classes            Html-classes to apply to this component.
 * @property string                     $id                 Html-id to apply to this component.
 * @property string                     $layout             Layout to use for this component.
 *
 * Setters for default properties:
 * ===============================
 * @method   CmsComponentPayload                      items(array $items)
 * @method   CmsComponentPayload                      itemDefaults(array $itemDefaults)
 * @method   CmsComponentPayload                      tag(string $tag)
 * @method   CmsComponentPayload                      title(mixed $title)
 * @method   CmsComponentPayload                      subtitle(mixed $subtitle)
 * @method   CmsComponentPayload                      isHtmlTitle(bool $isHtmlTitle)
 * @method   CmsComponentPayload                      content(string $content)
 * @method   CmsComponentPayload                      isHtmlContent(bool $isHtmlContent)
 * @method   CmsComponentPayload                      heading(CmsComponentPayload $headingPayload)
 * @method   CmsComponentPayload                      icon(mixed $title)
 * @method   CmsComponentPayload                      link(CmsLinkPayload $linkPayload)
 * @method   CmsComponentPayload                      classes(string[] $classes)
 * @method   CmsComponentPayload                      id(string $id)
 * @method   CmsComponentPayload                      layout(string $layout)
 *
 */
class CmsComponentPayload extends Payload
{



}
