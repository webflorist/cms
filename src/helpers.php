<?php

use Webflorist\Cms\CmsService;

if (! function_exists('cms')) {
    /**
     * Gets the CmsService singleton from Laravel's service-container
     *
     * @return CmsService
     */
    function cms()
    {
        return app(CmsService::class);
    }
}