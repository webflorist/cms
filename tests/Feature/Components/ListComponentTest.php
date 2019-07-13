<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\ListComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;

class ListComponentTest extends TestCase
{

    public function test_complex_list_component()
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
                ->payload(
                    (new CmsComponentPayload)
                        ->items(
                            [
                                (new CmsComponentPayload)
                                    ->icon('phone')
                                    ->content('Phone Icon'),
                                (new CmsComponentPayload)
                                    ->icon('mail')
                                    ->content('Mail Icon')
                            ]
                        ))
        );
    }

}