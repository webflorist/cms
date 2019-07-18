<?php

namespace Webflorist\Cms\Components\Abstracts;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\HtmlFactory\Components\Traits\HasLayout;
use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Exceptions\InvalidPayloadException;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;
use Webflorist\HtmlFactory\Payload\Abstracts\Payload;
use Webflorist\IconFactory\Payload\IconPayload;

/**
 * Class CmsComponent
 *
 * This is the main abstract class for a CMS-component.
 * It extends the DivElement from the webflorist/htmlfactory package.
 *
 * @package Webflorist\Cms\Components\Abstracts
 */
abstract class CmsComponent extends DivElement
{

    use HasLayout;

    /**
     * Payload.
     *
     * @var CmsComponentPayload
     */
    public $payload;

    /**
     * @throws InvalidPayloadException
     */
    protected function setUp()
    {
        parent::setUp();

        // Set default payload for CmsComponents.
        $this->payload(new CmsComponentPayload());
    }

    protected function beforeDecoration()
    {
        if (isset($this->payload->tag)) {
            $this->overrideName($this->payload->tag);
        }
        if (isset($this->payload->classes)) {
            $this->addClasses($this->payload->classes);
        }
        if (isset($this->payload->items)) {
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

    private function processItems()
    {
        foreach ($this->payload->items as $item) {
            /** @var CmsComponentPayload $item */

            // Add default item-values to items.
            if (isset($this->payload->itemDefaults)) {
                foreach ($this->payload->itemDefaults as $key => $value) {

                    // Handle settings of default-values for payloads of sub-components.
                    if (is_a($item->{$key}, CmsComponentPayload::class) && is_array($value)) {
                        foreach ($value as $subPayloadKey => $subPayloadValue) {
                            if (is_null($item->{$key}->$subPayloadKey)) {
                                $item->{$key}->$subPayloadKey = $subPayloadValue;
                            }
                        }
                    }

                    // Default handling, if $item->{$key} is not a sub-component.
                    if (is_null($item->{$key})) {
                        $item->{$key} = $value;
                    }
                }
            }
        }

    }



}