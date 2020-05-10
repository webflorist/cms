<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\DivElement;

class ListComponent extends DivElement
{
    use CmsComponent;

    /**
     * RowComponent constructor.
     */
    public function __construct(string $tag='ul')
    {
        parent::__construct();
        $this->overrideName($tag);
    }

    protected function setUp()
    {
        $this->setUpCmsComponent();
    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }

}
