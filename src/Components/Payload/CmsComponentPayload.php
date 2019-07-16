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
 * =========
 * @property array                      $items              Array of items (e.g. for a ListComponent)
 * @property array                      $itemDefaults       Array of default-values for items.
 * @property string|CmsComponentPayload $title              Title of component.
 * @property boolean                    $isHtmlTitle        Should $this->title be rendered as HTML or not (default=false).
 * @property string                     $content            Text or HTML content of component.
 * @property boolean                    $isHtmlContent      Should $this->content be rendered as HTML or not (default=false).
 * @property string|IconPayload         $icon               Icon of component.
 * @property string[]                   $classes            Html-classes to apply to this component.
 *
 */
class CmsComponentPayload extends Payload
{



}