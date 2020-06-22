@php
    /** @var \Webflorist\Cms\Components\SectionComponent $el */
@endphp

@component('cms::components._default.section', ['el' => $el])
    @isset($el->payload->content)
        @include('cms::components._partials.text', ['text' => $el->payload->content, 'isHtml' => true])
    @endisset
@endcomponent
