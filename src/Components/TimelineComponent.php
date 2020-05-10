<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class TimelineComponent extends DivElement
{
    use \Webflorist\Cms\Components\Traits\CmsComponent;

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

    protected function setUp()
    {
        $this->setUpCmsComponent();
    }

    /**
     * @throws PayloadNotFoundException
     */
    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();

        // Set default icon.
        foreach ($this->payload->items as $item) {
            if (is_null($item->icon)) {
                $item->icon = 'arrow-alt-circle-down';
            }
        }
    }


}
