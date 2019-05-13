<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;

class ColumnComponent extends Component
{

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->hasData('tag') ? $this->getData('tag') : 'div';
    }

    protected function setUp()
    {
        parent::setUp();

        // Bootstrap-specific.
        $this->addClass('col');

        if ($this->hasData('col-md')) {
            $this->addClass('col-md-' . $this->getData('col-md'));
        }

    }


}