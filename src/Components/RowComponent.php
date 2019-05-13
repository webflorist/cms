<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;

class RowComponent extends Component
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

    protected function setUp()
    {
        parent::setUp();

        // Bootstrap-specific.
        $this->addClass('row');

        if ($this->hasData('justify-content')) {
            $this->addClass('justify-content-'.$this->getData('justify-content'));
        }

    }


}