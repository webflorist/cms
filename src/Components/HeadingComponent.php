<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;
use Webflorist\HtmlFactory\Exceptions\CustomDataNotFoundException;

class HeadingComponent extends Component
{

    /**
     * Returns the name of the element.
     *
     * @return string
     * @throws CustomDataNotFoundException
     */
    public function getName(): string
    {
        return $this->hasData('tag') ? $this->getData('tag') : 'h1';
    }

    protected function setUp()
    {
        parent::setUp();

        // Bootstrap-specific.
        $this->addClass('title');

    }
}