<?php

namespace Webflorist\Cms;

use Webflorist\Cms\Components\Blockquote;
use Webflorist\Cms\Components\H2;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\HtmlFactory;

class CmsHtmlFactory extends HtmlFactory
{

    public function generateElementFromArray(array $elementData)
    {

        $accessor = $elementData['element'];
        unset ($elementData['element']);
        /** @var Element $element */
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

    /**
     * @return Blockquote
     */
    public static function blockquote()
    {
        return new Blockquote();
    }

    /**
     * @return H2
     */
    public static function h2()
    {
        return new H2();
    }
}