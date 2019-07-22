<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    @foreach($el->payload->items as $item)
        <dt>
            @include('cms::components._partials.text', ['text' => $item->title, 'isHtml' => $item->isHtmlTitle])
        </dt>
        <dd>
            @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
        </dd>
    @endforeach
</{{$el->getName()}}>