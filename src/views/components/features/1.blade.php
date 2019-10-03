@foreach($el->payload->items as $item)
    <div class="info info-horizontal {{$item->classes ?? ''}}">
        @isset($item->icon)
            <div class="icon text-primary">
                {!! icon_factory($item->icon) !!}
            </div>
        @endisset
        <div class="description">
            @isset($item->heading)
                {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClass('info-title') !!}
            @endisset
            <p>
                @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
            </p>
        </div>
    </div>
@endforeach
