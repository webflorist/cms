<?php

namespace Webflorist\HtmlFactory;

use Illuminate\Support\Facades\Facade;
use Webflorist\Cms\CmsService;

class CmsFacade extends Facade {

    /**
     * Static access-proxy for the HtmlFactory
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return CmsService::class; }

}