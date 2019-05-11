<?php

use Webflorist\Cms\CmsService;

if (! function_exists('cms')) {
    /**
     * Gets the CmsService singleton from Laravel's service-container
     *
     * @return CmsService
     */
    function route_tree()
    {
        return app(CmsService::class);
    }
}