<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\FeaturesComponent;

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
                ->payload([
                    'items' => [

                        [
                            'title' => 'Phone',
                            'icon' => 'phone',
                            'text' => 'My Phone Number'
                        ],
                        [
                            'title' => 'E-Mail',
                            'icon' => 'email',
                            'text' => 'My E-Mail Address'
                        ]
                    ]
                ])
        );
    }

}