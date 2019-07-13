<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;

class RowComponent extends CmsComponent
{
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
        parent::setUp();

        // Bootstrap-specific.
        $this->addClass('row');

    }


}