<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\FeaturesComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;

class FeatureComponentTest extends TestCase
{

    public function test_complex_feature_component()
    {

        $this->assertHtmlEquals(
            '
                <div class=" text-center">
                    <div class="info">
                        <div class="icon icon-primary"> <i class="fas fa-phone"></i> </div>
                        <h3 class="info-title">
                            Phone
                        </h3>
                        <p>My Phone Number</p>
                    </div>
                </div>
                <div class=" text-center">
                    <div class="info">
                        <div class="icon icon-primary"> <i class="fas fa-email"></i> </div>
                        <h3 class="info-title">
                            E-Mail
                        </h3>
                        <p>My E-Mail Address</p>
                    </div>
                </div>
            ',
            (new FeaturesComponent)
                ->payload(
                    (new CmsComponentPayload)
                        ->items(
                            [
                                (new CmsComponentPayload)
                                    ->heading(new CmsComponentPayload(['tag' => 'h3', 'title' => 'Phone']))
                                    ->icon('phone')
                                    ->content('My Phone Number'),
                                (new CmsComponentPayload)
                                    ->heading(new CmsComponentPayload(['tag' => 'h3', 'title' => 'E-Mail']))
                                    ->icon('email')
                                    ->content('My E-Mail Address')
                            ]
                        )
                )
        );
    }

}