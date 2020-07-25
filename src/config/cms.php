<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CMS Adapter
    |--------------------------------------------------------------------------
    |
    | The adapter class to use.
    |
    */
    'adapter' => \Webflorist\Cms\Adapters\SanityCmsAdapter::class,

    /*
    |--------------------------------------------------------------------------
    | Config for CMS Services
    |--------------------------------------------------------------------------
    |
    */
    'services' => [

        // Config for Sanity CMS
        'sanity' => [
              'project_id' => env('SANITY_PROJECT_ID', 'your-project-id'),
              'dataset' => env('SANITY_DATASET', 'your-dataset-name'),
              'api_version' => env('SANITY_API_VERSION', '2020-05-25'),
            'use_cdn' => env('SANITY_USE_CDN', false)
        ]

    ]

];
