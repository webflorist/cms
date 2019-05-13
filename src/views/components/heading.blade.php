<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    {{ $el->getData('title') }}
    @if($el->hasData('subtitle'))
        <small class="d-block text-muted">{{$el->getData('subtitle')}}</small>
    @endif
</{{$el->getName()}}>