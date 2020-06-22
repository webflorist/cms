<?php

namespace Webflorist\Cms\Components;

use Webflorist\Cms\Components\Payload\CmsLinkPayload;
use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\HtmlFactory\Elements\AElement;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Payload\Abstracts\Payload;

class SchemaComponent extends DivElement
{
    use CmsComponent;

    protected $anchor;

    /**
     * SchemaComponent constructor.
     */
    public function __construct(?Payload $payload = null)
    {
        parent::__construct();
        if ($payload instanceof Payload) {
            $this->payload = $payload;
        }
    }

    protected function setUp()
    {
        $this->setUpCmsComponent();
    }

    protected function beforeDecoration()
    {
        $this->beforeDecorationOfCmsComponent();
    }

}
