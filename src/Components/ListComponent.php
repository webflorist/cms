<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;

class ListComponent extends Component
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