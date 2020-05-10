<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\H1Element;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class HeadingComponent extends H1Element
{
    use CmsComponent;

    /**
     * RowComponent constructor.
     *
     * @param string $tag
     */
    public function __construct(string $tag='h1')
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
