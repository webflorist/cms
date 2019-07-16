<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class BibliographyComponent extends CmsComponent
{

    /**
     * @throws PayloadNotFoundException
     */
    protected function beforeDecoration()
    {
        parent::beforeDecoration();

        // Set default icon.
        foreach ($this->payload->items as $item) {
            if (!isset($item->icon)) {
                $item->icon = 'bookmark';
            }
        }
    }

}