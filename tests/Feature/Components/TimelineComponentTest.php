<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\HeadingComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\Cms\Components\TimelineComponent;

class TimelineComponentTest extends TestCase
{

    public function test_complex_timeline_component()
    {

        $this->assertHtmlEquals(
            '
                <div class="cms-timeline-default-7">
                    <div class="timeline">
                        <div class="timeline-icon"> <i class="fas fa-arrow-alt-circle-down"></i> </div>
                        <span class="year">1999</span>
                        <div class="timeline-content">
                            <h1>
                                Item 1 Title
                            </h1>
                            <p class="description"> Item 1 Text </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="timeline-icon"> <i class="fas fa-arrow-alt-circle-down"></i> </div>
                        <span class="year">2003</span>
                        <div class="timeline-content">
                            <h1>
                                Item 2 Title
                            </h1>
                            <p class="description"> Item 2 Text </p>
                        </div>
                    </div>
                </div>
            ',
            (new TimelineComponent)
                ->layout('default-7')
                ->payload(
                    (new CmsComponentPayload)
                        ->items(
                            [
                                (new CmsComponentPayload)
                                    ->date(1999)
                                    ->heading(new CmsComponentPayload([
                                        'tag' => 'h1',
                                        'title' => 'Item 1 Title'
                                    ]))
                                    ->content('Item 1 Text'),

                                (new CmsComponentPayload)
                                    ->date(2003)
                                    ->heading(new CmsComponentPayload([
                                        'tag' => 'h1',
                                        'title' => 'Item 2 Title'
                                    ]))
                                    ->content('Item 2 Text')
                            ]
                        )
                )
        );
    }

}