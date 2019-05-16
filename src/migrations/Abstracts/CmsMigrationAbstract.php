<?php

namespace Webflorist\Cms\Migrations\Abstracts;

use Illuminate\Database\Migrations\Migration;

abstract class CmsMigrationAbstract extends Migration
{

    /**
     * CreateCmsComponentsTable constructor.
     *
     */
    public function __construct()
    {
        $this->connection = config('cms.database.connection');
    }
}
