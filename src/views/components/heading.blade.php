<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    {{ $el->getPayload('title') }}
    @if($el->hasPayload('subtitle'))
        <small class="d-block text-muted">{{$el->getPayload('subtitle')}}</small>
    @endif
</{{$el->getName()}}>