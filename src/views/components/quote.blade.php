<blockquote{!! $el->attributes->render(true) !!}>
    <p class="m-b-0">{{$el->getPayload('text')}}</p>
    @if($el->hasPayload('footer'))
        <footer class="blockquote-footer">{{$el->getPayload('footer')}}</footer>
    @endif
</blockquote>