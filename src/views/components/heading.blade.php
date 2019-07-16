<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    @include('cms::components._partials.text', ['text' => $el->payload->title, 'isHtml' => $el->payload->isHtmlTitle])
    @if(isset($el->payload->subtitle))
        <small class="d-block text-muted">{{$el->payload->subtitle}}</small>
    @endif
</{{$el->getName()}}>