<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    @foreach($el->payload->items as $item)
        <li class="media">
            @isset($item->icon)
                <div class="mr-3 icon text-primary">
                    <i class="{{$item->icon}}"></i>
                </div>
            @endisset
            <div class="media-body">
                @isset($item->heading)
                    {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClasses(['mt-0', 'mb-1']) !!}
                @endisset
                @isset($item->content)
                    <p>
                        @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
                    </p>
                @endisset
            </div>
        </li>
    @endforeach
</{{$el->getName()}}>