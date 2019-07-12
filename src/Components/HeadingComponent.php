<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\Component;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class HeadingComponent extends Component
{
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
}