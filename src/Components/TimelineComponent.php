<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class TimelineComponent extends Component
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

    protected function beforeDecoration()
    {
        parent::beforeDecoration();

        // Set default icon.
        foreach ($this->getPayload('items') as $itemKey => $itemData) {
            if (!isset($itemData['icon'])) {
                $itemData['icon'] = 'fas fa-check-circle';
                $this->payload($itemData, "items.$itemKey");
            }
        }
    }


}