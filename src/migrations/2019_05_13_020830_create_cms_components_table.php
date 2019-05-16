<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Webflorist\Cms\Migrations\Abstracts\CmsMigrationAbstract;

class CreateCmsComponentsTable extends CmsMigrationAbstract
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->nullable();
            $table->string('name');               // e.g. column, heading, timeline, etc.
            $table->string('tag')->nullable();    // e.g. div, section, area, h1, h2, etc.
            $table->string('layout')->nullable(); // e.g. default-01, my-layout-02
            $table->jsonb('payload')->nullable(); // any additional array-structured json-data
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('cms_components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_components');
    }
}
