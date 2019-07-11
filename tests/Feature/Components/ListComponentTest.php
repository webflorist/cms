<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\ListComponent;

class ListComponentTest extends TestCase
{

    public function test_complex_heading_component()
    {

        $this->assertHtmlEquals(
            '
                <ul>
                    <li class="media">
                        <div class="mr-3 icon icon-primary"> <i class="fas fa-phone"></i> </div>
                        <div class="media-body">
                            <p>Phone Icon</p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3 icon icon-primary"> <i class="fas fa-mail"></i> </div>
                        <div class="media-body">
                            <p>Mail Icon</p>
                        </div>
                    </li>
                </ul>
            ',
            (new ListComponent())
                ->payload([
                    'items' => [
                        [
                            'icon' => 'phone',
                            'text' => 'Phone Icon'
                        ],
                        [
                            'icon' => 'mail',
                            'text' => 'Mail Icon'
                        ]
                    ]
                ])
        );
    }

}