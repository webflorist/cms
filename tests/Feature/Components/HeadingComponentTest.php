<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\HeadingComponent;

class HeadingComponentTest extends TestCase
{

    public function test_complex_heading_component()
    {
        $data = [
            'tag' => 'h1',
            'title' => 'Torquiss cadunt in copinga!',
            'subtitle' => 'Sunt scutumes pugna rusticus, nobilis historiaes.'
        ];

        $this->assertHtmlEquals(
            '
                <h1>
                    Torquiss cadunt in copinga!
                    <small class="d-block text-muted">Sunt scutumes pugna rusticus, nobilis historiaes.</small>
                </h1>
            ',
            (new HeadingComponent($data))
        );
    }

}