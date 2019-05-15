<?php

namespace Webflorist\Cms\Components\Factory;

use Webflorist\Cms\Components\Abstracts\Component;
use Webflorist\Cms\Components\ColumnComponent;
use Webflorist\Cms\Components\HeadingComponent;
use Webflorist\Cms\Exceptions\InvalidAccessorException;

/**
 * Factory to create CMS components.
 * Provides (magic) factory methods for all included components.
 *
 * Class ComponentFactory
 * @package Webflorist\Cms
 *
 *
 * Components:
 * ===========
 * @method static ColumnComponent             column(array $data, array $children=[])
 * @method static HeadingComponent            heading(array $data, array $children=[])
 *
 */
class ComponentFactory
{

    /**
     * Magic method to construct a HTML-element or -component.
     * See '@method' declarations of class-phpdoc
     * for available methods.
     *
     * @param $accessor
     * @param $arguments
     * @return Component
     *
     * @throws InvalidAccessorException
     */
    public function __call($accessor, $arguments)
    {
        // If the accessor refers to a element, we return a new instance of it.
        $elementClass = 'Webflorist\\Cms\\Components\\' . ucfirst($accessor) . 'Component';
        if (class_exists($elementClass)) {
            return new $elementClass(...$arguments);
        }

        /*
         * // TODO: Make this work.
        // If the accessor refers to a component, we return a new instance of it.
        if ($this->components->isRegistered($accessor)) {
            $componentClass = $this->components->getClass($accessor);
            return new $componentClass(...$arguments);
        }
        */


        // If the accessor is neither a element nor a component, we throw an exception.
        throw new InvalidAccessorException('No component found for accessor "'.$accessor.'".');

    }

    public function generateElementFromArray(array $elementData)
    {

        $accessor = $elementData['element'];
        unset ($elementData['element']);
        /** @var Component $element */
        $element = self::$accessor();

        if (isset($elementData['content']) && !is_string($elementData['content'])) {
            foreach ($elementData['content'] as $childKey => $childElement) {
                if (!is_string($childElement)) {
                    $elementData['content'][$childKey] = $this->generateElementFromArray($childElement);
                }
            }
        }

        foreach ($elementData as $method => $parameter) {
            $element->$method($parameter);
        }
        return $element->generate();
    }

}