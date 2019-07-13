<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\BibliographyComponent;
use Webflorist\Cms\Components\ListComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;

class BibliographyComponentTest extends TestCase
{

    public function test_complex_bibliography_component()
    {

        $this->assertHtmlEquals(
            '
                <ul >
                    <li class="media">
                        <div class="mr-3 icon icon-primary"> <i class="fas fa-bookmark"></i> </div>
                        <cite class="media-body">
                            <p>
                                Frank Herbert: Dune (1965)
                                <br/>
                                <a href="https://en.wikipedia.org/wiki/Dune_(novel)" target="_blank">https://en.wikipedia.org/wiki/Dune_(novel)</a>                            
                            </p>
                        </cite>
                    </li>
                    <li class="media">
                        <div class="mr-3 icon icon-primary"> <i class="fas fa-bookmark"></i> </div>
                        <cite class="media-body">
                            <p>
                                Isaac Asimov: Foundation (1951)
                                <br/>
                                <a href="https://en.wikipedia.org/wiki/Foundation_(Asimov_novel)" target="_blank">https://en.wikipedia.org/wiki/Foundation_(Asimov_novel)</a>                            
                            </p>
                        </cite>
                    </li>
                </ul>
            ',
            (new BibliographyComponent)
                ->payload([
                    (new CmsComponentPayload)
                        ->author('Frank Herbert')
                        ->title('Dune')
                        ->year(1965)
                        ->url('https://en.wikipedia.org/wiki/Dune_(novel)'),
                    (new CmsComponentPayload)
                        ->author('Isaac Asimov')
                        ->title('Foundation')
                        ->year(1951)
                        ->url('https://en.wikipedia.org/wiki/Foundation_(Asimov_novel)')
                ],'items')
        );
    }

}