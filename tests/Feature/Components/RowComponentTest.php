<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\HeadingComponent;
use Webflorist\Cms\Components\RowComponent;
use Webflorist\Cms\Components\TextComponent;

class RowComponentTest extends TestCase
{

    public function test_complex_row_component()
    {
        $data = [
            'tag' => 'section',
            'justify-content' => 'center'
        ];
        $children = ['Favere vix ducunt ad clemens detrius.'];

        $this->assertHtmlEquals(
            '
                <section class="row justify-content-center">
                    Favere vix ducunt ad clemens detrius.
                </section>
            ',
            (new RowComponent($data, $children))
        );
    }

}