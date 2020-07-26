<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\SectionElement;

class SectionComponent extends SectionElement
{
    use \Webflorist\Cms\Components\Traits\CmsComponent;

    protected function setUp()
    {
        $this->setUpCmsComponent();
    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }

}
