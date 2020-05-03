<{{$el->getName()}}{!! $el->addClass('row')->attributes->render(true) !!}>
    @foreach($el->payload->items as $item)
        <div class="col info text-center {{$item->classes ?? ''}}">
            @isset($item->icon)
                <div class="icon text-primary">
                    <i class="{{$item->icon}}"></i>
                </div>
            @endisset
            @isset($item->heading)
                {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClass('info-title') !!}
            @endisset
            @isset($item->content)
                <p>
                    @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
                </p>
            @endisset
        </div>
    @endforeach
</{{$el->getName()}}>
