<?php

namespace Webflorist\Cms\Components\Factory;

use Webflorist\Cms\Components\FeaturesComponent;
use Webflorist\Cms\Components\LinkListComponent;
use Webflorist\Cms\Components\Payload\CmsComponentPayload;
use Webflorist\Cms\Components\Traits\CmsComponent;
use Webflorist\Cms\Components\BibliographyComponent;
use Webflorist\Cms\Components\ColumnComponent;
use Webflorist\Cms\Components\HeadingComponent;
use Webflorist\Cms\Components\ListComponent;
use Webflorist\Cms\Components\LinkComponent;
use Webflorist\Cms\Components\SchemaComponent;
use Webflorist\Cms\Components\SectionComponent;
use Webflorist\Cms\Components\Payload\CmsLinkPayload;
use Webflorist\Cms\Exceptions\InvalidAccessorException;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;

/**
 * Factory to create CMS-related payloads.
 * Provides (magic) factory methods for all included payloads.
 *
 * Class ComponentFactory
 * @package Webflorist\Cms
 *
 *
 * Components:
 * ===========
 * @method CmsComponentPayload         component(?array $data)
 * @method CmsLinkPayload              link(?array $data)
 * @method CmsLinkPayload              link(?array $data)
 *
 */
class CmsPayloadFactory
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
        $elementClass = 'Webflorist\\Cms\\Components\\Payload\\Cms' . ucfirst($accessor) . 'Payload';
        if (class_exists($elementClass)) {
            return new $elementClass(...$arguments);
        }


        // If the accessor is neither a element nor a component, we throw an exception.
        throw new InvalidAccessorException('No component found for accessor "'.$accessor.'".');

    }

}
