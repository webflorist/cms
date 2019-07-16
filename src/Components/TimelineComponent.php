<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class TimelineComponent extends CmsComponent
{

    /**
     * Returns the name of the element.
     *
     * @return string
     * @throws PayloadNotFoundException
     */
    public function getName(): string
    {
        return $this->hasData('tag') ? $this->getData('tag') : 'div';
    }

    /**
     * @throws PayloadNotFoundException
     */
    protected function beforeDecoration()
    {
        parent::beforeDecoration();

        // Set default icon.
        foreach ($this->payload->items as $item) {
            if (is_null($item->icon)) {
                $item->icon = 'arrow-alt-circle-down';
            }
        }
    }


}