<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    {{ $el->payload->get('title') }}
    @if($el->payload->has('subtitle'))
        <small class="d-block text-muted">{{$el->payload->get('subtitle')}}</small>
    @endif
</{{$el->getName()}}>