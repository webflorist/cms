<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;

class HeadingComponent extends CmsComponent
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