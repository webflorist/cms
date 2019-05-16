<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;

class QuoteComponent extends Component
{

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'blockquote';

    protected function setUp()
    {
        parent::setUp();

        // Bootstrap-specific.
        $this->addClass('blockquote');

    }
}