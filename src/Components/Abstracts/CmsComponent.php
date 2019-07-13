<?php

namespace Webflorist\Cms\Components\Abstracts;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\HtmlFactory\Components\Traits\HasLayout;
use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Exceptions\InvalidPayloadException;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;
use Webflorist\IconFactory\Payload\IconPayload;

/**
 * Class CmsComponent
 *
 * This is the main abstract class for a CMS-component.
 * It extends the ContainerElement from the webflorist/htmlfactory package.
 *
 * @package Webflorist\Cms\Components\Abstracts
 */
abstract class CmsComponent extends ContainerElement
{

    use HasLayout;

    /**
     * @throws InvalidPayloadException
     */
    protected function setUp()
    {
        parent::setUp();

        // Set default payload for CmsComponents.
        $this->payload(new CmsComponentPayload());
    }


    /**
     * @throws PayloadNotFoundException
     */
    protected function beforeDecoration()
    {
        if ($this->payload->has('items')) {
            $this->processItems();
        }
        $this->determineView();
    }

    protected function getComponentName()
    {
        $shortClassName = Arr::last(explode('\\', get_class($this)));
        return Str::kebab(substr($shortClassName, 0, -9));
    }

    private function determineView()
    {
        $viewSuffix = $this->getComponentName();
        if ($this->hasLayout()) {
            $viewSuffix .= '.' . $this->getLayout();
        }
        $this->view('cms::components.' . $viewSuffix);
    }

    /**
     * @throws PayloadNotFoundException
     */
    private function processItems()
    {
        foreach ($this->payload->get('items') as $item) {
            /** @var CmsComponentPayload $item */

            // Add default item-values to items.
            if ($this->payload->has('itemDefaults')) {
                foreach ($this->payload->get('itemDefaults') as $key => $value) {
                    if (is_null($item->{$key})) {
                        $item->{$key} = $value;
                    }
                }
            }
        }

    }



}