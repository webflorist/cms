<?php

namespace Webflorist\Cms\Components\Abstracts;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class Component
 *
 * This is the main abstract class for a CMS-component.
 * It extends the ContainerElement from the webflorist/htmlfactory package.
 *
 * @package Webflorist\Cms\Components\Abstracts
 */
abstract class Component extends ContainerElement
{

    /**
     * Component constructor.
     *
     * @param array $data
     * @param array $children
     */
    public function __construct(array $data, array $children=[])
    {
        $this->customData($data);
        parent::__construct();
        $this->appendContent($children);
        $this->view('cms::components.'.$this->getType());
    }

    protected function getType()
    {
        $shortClassName = Arr::last(explode('\\', get_class($this)));
        return Str::kebab(substr($shortClassName, 0, -9));
    }
}