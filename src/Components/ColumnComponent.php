<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;

class ColumnComponent extends CmsComponent
{
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
        parent::setUp();

        // Bootstrap-specific.
        $this->addClass('col');

    }


}