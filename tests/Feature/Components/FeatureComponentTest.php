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

    public function test_complex_feature_component_using_item_defaults()
    {

        $this->assertHtmlEquals(
            '
                <div class=" text-center">
                    <div class="info">
                        <div class="icon icon-primary"> <i class="fas fa-check"></i> </div>
                        <h4 class="info-title">
                            Feature 1 Title
                        </h4>
                        <p>My Feature 1 Content</p>
                    </div>
                </div>
                <div class=" text-center">
                    <div class="info">
                        <div class="icon icon-primary"> <i class="fas fa-check"></i> </div>
                        <h4 class="info-title">
                            Feature 2 Title
                        </h4>
                        <p>My Feature 2 Content</p>
                    </div>
                </div>
            ',
            (new FeaturesComponent)
                ->payload(
                    (new CmsComponentPayload)
                        ->itemDefaults([
                            'heading' => [
                                'tag' => 'h4'
                            ],
                            'icon' => 'check'
                        ])
                        ->items(
                            [
                                (new CmsComponentPayload)
                                    ->heading(new CmsComponentPayload(['title' => 'Feature 1 Title']))
                                    ->content('My Feature 1 Content'),
                                (new CmsComponentPayload)
                                    ->heading(new CmsComponentPayload(['title' => 'Feature 2 Title']))
                                    ->content('My Feature 2 Content')
                            ]
                        )
                )
        );
    }

}