<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Abstracts\CmsComponent;

class FeaturesComponent extends CmsComponent
{

    /**
     * FeatureComponent constructor.
     */
    public function __construct(string $tag='div')
    {
        parent::__construct();
        $this->overrideName($tag);
    }

}