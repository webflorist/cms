<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;

class ListComponent extends CmsComponent
{
    /**
     * RowComponent constructor.
     */
    public function __construct(string $tag='ul')
    {
        parent::__construct();
        $this->overrideName($tag);
    }

}