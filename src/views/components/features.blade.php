<{{$el->getName()}}{!! $el->addClass('row')->attributes->render(true) !!}>
    @foreach($el->payload->items as $item)
        <div class="col info text-center {{$item->classes ?? ''}}">
            @isset($item->icon)
                <div class="icon text-primary">
                    {!! icon_factory($item->icon) !!}
                </div>
            @endisset
            @isset($item->heading)
                {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClass('info-title h4') !!}
            @endisset
            @isset($item->content)
                <p>
                    @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
                </p>
            @endisset
        </div>
    @endforeach
</{{$el->getName()}}>
