<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Webflorist\Cms\Migrations\Abstracts\CmsMigrationAbstract;

class CreateCmsComponentUtilitiesTable extends CmsMigrationAbstract
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_component_utilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('component_id');
            $table->bigInteger('utility_id');
            $table->timestamps();

            $table->unique(['component_id', 'utility_id']);

            $table->foreign('component_id')->references('id')->on('cms_components');
            $table->foreign('utility_id')->references('id')->on('cms_utilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_component_utilities');
    }
}
