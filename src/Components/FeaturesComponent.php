<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;

class FeaturesComponent extends Component
{

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->hasData('tag') ? $this->getData('tag') : 'section';
    }

}