<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class BibliographyComponent extends DivElement
{
    use \Webflorist\Cms\Components\Traits\CmsComponent;

    /**
     * @throws PayloadNotFoundException
     */
    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();

        // Set default icon.
        foreach ($this->payload->items as $item) {
            if (!isset($item->icon)) {
                $item->icon = 'fas fa-bookmark';
            }
        }
    }

}
