<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\DivElement;

class RowComponent extends DivElement
{
    use \Webflorist\Cms\Components\Traits\CmsComponent;

    /**
     * RowComponent constructor.
     * @param string $tag
     */
    public function __construct(string $tag='div')
    {
        parent::__construct();
        $this->overrideName($tag);
    }

    protected function setUp()
    {
        $this->setUpCmsComponent();

        // Bootstrap-specific.
        $this->addClass('row');

    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }


}
