<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\DescriptionListComponent;
use Webflorist\Cms\Components\ListComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;

class DescriptionListComponentTest extends TestCase
{

    public function test_complex_description_list_component()
    {

        $this->assertHtmlEquals(
            '
                <dl>
                    <dt>Description Term 1</dt>
                    <dd>Description Text 1</dd>
                    <dt>Description<br />Term 2</dt>
                    <dd>Description<br />Text 2</dd>
                </dl>
            ',
            (new DescriptionListComponent())
                ->payload(
                    (new CmsComponentPayload)
                        ->items(
                            [
                                (new CmsComponentPayload)
                                    ->title('Description Term 1')
                                    ->content('Description Text 1'),
                                (new CmsComponentPayload)
                                    ->title('Description<br />Term 2')
                                    ->isHtmlTitle(true)
                                    ->content('Description<br />Text 2')
                                    ->isHtmlContent(true)
                            ]
                        ))
        );
    }

}