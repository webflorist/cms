<?php

namespace CmsTests\Feature\Elements;

use CmsTests\TestCase;
use Webflorist\Cms\Components\BibliographyComponent;
use Webflorist\Cms\Components\ListComponent;

class BibliographyComponentTest extends TestCase
{

    public function test_complex_bibliography_component()
    {

        $this->assertHtmlEquals(
            '
                <ul >
                    <li>
                        <cite>
                            Frank Herbert: Dune (1965)
                            <br/>
                            <a href="https://en.wikipedia.org/wiki/Dune_(novel)" target="_blank">https://en.wikipedia.org/wiki/Dune_(novel)</a>
                        </cite>
                    </li>
                    <li>
                        <cite>
                            Isaac Asimov: Foundation (1951)
                            <br/>
                            <a href="https://en.wikipedia.org/wiki/Foundation_(Asimov_novel)" target="_blank">https://en.wikipedia.org/wiki/Foundation_(Asimov_novel)</a>
                        </cite>
                    </li>
                </ul>
            ',
            (new BibliographyComponent)
                ->payload([
                    'items' => [
                        [
                            'author' => 'Frank Herbert',
                            'title' => 'Dune',
                            'year' => '1965',
                            'url' => 'https://en.wikipedia.org/wiki/Dune_(novel)',
                        ],
                        [
                            'author' => 'Isaac Asimov',
                            'title' => 'Foundation',
                            'year' => '1951',
                            'url' => 'https://en.wikipedia.org/wiki/Foundation_(Asimov_novel)',
                        ]
                    ]
                ])
        );
    }

}