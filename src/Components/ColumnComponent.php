<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class ColumnComponent extends DivElement
{
    use \Webflorist\Cms\Components\Traits\CmsComponent;

    /**
     * RowComponent constructor.
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
        $this->addClass('col');
    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }


}
