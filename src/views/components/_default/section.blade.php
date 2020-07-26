@php
    /** @var \Webflorist\Cms\Components\SectionComponent $el */
    $el->addClass('row w-100 justify-content-center mb-3');
@endphp

{!! $el->renderStartTag() !!}

    <div class="col col-md-8">
        @isset($el->payload->heading)
            @if($el->payload->has('icon'))
                <div class="d-flex align-items-center">
                    <i class="text-primary text-5xl mr-3 {{$el->payload->icon}}"></i>
                    {!! cms()->create()->heading()->payload($el->payload->heading) !!}
                </div>
            @else
                {!! cms()->create()->heading()->payload($el->payload->heading) !!}
            @endif
        @endisset
        @if($el->getLayout() != 'wide')
            {!! $slot !!}
        @endif
    </div>

    @if($el->getLayout() == 'wide')
        <div class="col col-12 mt-3">
            {!! $slot !!}
        </div>
    @endif

{!! $el->renderEndTag() !!}
