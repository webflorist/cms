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
 *
 * Setters for default properties:
 * ===============================
 * @method   CmsLinkPayload             href(string $href)
 * @method   CmsLinkPayload             target(string $target)
 * @method   CmsLinkPayload             title(string $title)
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
}
