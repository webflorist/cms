<?php

namespace Webflorist\Cms\Components\Abstracts;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Components\Traits\HasLayout;
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

    use HasLayout;

    protected function beforeDecoration()
    {
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
}