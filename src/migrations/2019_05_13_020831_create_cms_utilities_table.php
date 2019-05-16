<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Webflorist\Cms\Migrations\Abstracts\CmsMigrationAbstract;

class CreateCmsUtilitiesTable extends CmsMigrationAbstract
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_utilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');               // e.g. spacing, display, float, etc.
            $table->string('name')->unique();     // e.g. pt-0, text-center, etc.
            $table->timestamps();
        });

        $this->insertDefaults();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_utilities');
    }

    private function insertDefaults()
    {

        // Spacing
        $properties = [
            'm',    // margin
            'p'     // padding
        ];
        $sides = [
            't',    // margin-top or padding-top
            'b',    // margin-bottom or padding-bottom
            'l',    // margin-left or padding-left
            'r',    // margin-right or padding-right
            'x',    // both *-left and *-right
            'y',    // both *-top and *-bottom
            '',     // a margin or padding on all 4 sides of the element
        ];
        $sizes = [
            '0',    // for classes that eliminate the margin or padding by setting it to 0
            '1',    // (by default) for classes that set the margin or padding to $spacer * .25
            '2',    // (by default) for classes that set the margin or padding to $spacer * .5
            '3',    // (by default) for classes that set the margin or padding to $spacer
            '4',    // (by default) for classes that set the margin or padding to $spacer * 1.5
            '5',    // (by default) for classes that set the margin or padding to $spacer * 3
            'auto'  // for classes that set the margin to auto
        ];

        foreach ($properties as $property) {

            // Handle negative margins.
            if ($property === 'm') {
                foreach ([1,2,3,4,5] as $value) {
                    $sizes[] = "n$value";
                }
            }

            foreach ($sides as $side) {

                foreach ($sizes as $size) {
                    $this->insertUtility(
                        'spacing',
                        $property . $side . "-" . $size
                    );

                    foreach ($this->getBreakpoints() as $breakpoint) {
                        $this->insertUtility(
                            'spacing',
                            $property . $side . "-" . $breakpoint . "-" . $size
                        );
                    }
                }

            }

        }
    }

    private function insertUtility(string $type, string $name)
    {

        DB::table('cms_utilities')->insert(
            [
                'type' => $type,
                'name' => $name
            ]
        );
    }

    private function getBreakpoints()
    {
        return [
            'xs', // Extra small screen / phone
            'sm', // Small screen / phone
            'md', // Medium screen / tablet
            'lg', // Large screen / desktop
            'xl', // Extra large screen / wide desktop
        ];
    }
}
