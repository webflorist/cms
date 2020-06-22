@php
    /** @var \Webflorist\Cms\Components\LinkListComponent $el */
@endphp

@component('cms::components._default.section', ['el' => $el])
    {!! $el->renderStartTag() !!}

    @foreach($el->payload->items as $item)
        <li class="media">
            <div class="mr-3 icon text-primary">
                <i class="fas fa-external-link"></i>
            </div>
            <div class="media-body position-relative">
                {!! cms()->create()->link()->payload($item) !!}
            </div>
        </li>
    @endforeach

    {!! $el->renderEndTag() !!}
@endcomponent



