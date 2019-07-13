<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\HeadingComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\Cms\Components\QuoteComponent;

class QuoteComponentTest extends TestCase
{

    public function test_complex_quote_component()
    {
        $this->assertHtmlEquals(
            '
                <blockquote class="blockquote">
                    <p class="m-b-0">Engange!</p>
                    <footer class="blockquote-footer">Cpt. Jean-Luc Picard</footer>
                </blockquote>
            ',
            (new QuoteComponent())->payload(new CmsComponentPayload([
                'content' => 'Engange!',
                'footer' => 'Cpt. Jean-Luc Picard'
            ]))
        );
    }

}