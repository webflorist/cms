<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\BlockquoteElement;

class QuoteComponent extends BlockquoteElement
{
    use CmsComponent;

    protected function setUp()
    {
        $this->setUpCmsComponent();

        // Bootstrap-specific.
        $this->addClass('blockquote');

    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }
}
