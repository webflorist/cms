<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;
use Webflorist\HtmlFactory\Exceptions\CustomDataNotFoundException;

class TimelineComponent extends Component
{

    /**
     * Returns the name of the element.
     *
     * @return string
     * @throws CustomDataNotFoundException
     */
    public function getName(): string
    {
        return $this->hasData('tag') ? $this->getData('tag') : 'div';
    }

    /**
     * @throws CustomDataNotFoundException
     */
    protected function setUp()
    {
        parent::setUp();

        // Set default icon.
        foreach ($this->getData('items') as $itemKey => $itemData) {
            if (!isset($itemData['icon'])) {
                $itemData['icon'] = 'fas fa-check-circle';
                $this->customData($itemData, "items.$itemKey");
            }
        }

    }


}