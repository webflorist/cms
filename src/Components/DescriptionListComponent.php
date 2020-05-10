<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\DivElement;

class DescriptionListComponent extends DivElement
{
    use CmsComponent;

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'dl';

    protected function setUp()
    {
        $this->setUpCmsComponent();
    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }

}
