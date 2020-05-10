<?php

namespace Webflorist\Cms\Components\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\HtmlFactory\Components\Traits\HasLayout;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Exceptions\InvalidPayloadException;

/**
 * Trait CmsComponent
 *
 * This is the main trait for a CMS-component.
 *
 * @package Webflorist\Cms\Components\Traits
 */
trait CmsComponent
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
    protected function setUpCmsComponent()
    {
        parent::setUp();

        // Set default payload for CmsComponents.
        $this->payload(new CmsComponentPayload());
    }

    protected function beforeDecorationOfCmsComponent()
    {
        parent::beforeDecoration();

        if (isset($this->payload->tag)) {
            $this->overrideName($this->payload->tag);
        }
        if (isset($this->payload->classes)) {
            $this->addClasses($this->payload->classes);
        }
        if (isset($this->payload->id)) {
            $this->id($this->payload->id);
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
