<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;

class QuoteComponent extends CmsComponent
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