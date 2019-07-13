<blockquote{!! $el->attributes->render(true) !!}>
    <p class="m-b-0">{{$el->payload->get('text')}}</p>
    @if($el->has('footer'))
        <footer class="blockquote-footer">{{$el->payload->get('footer')}}</footer>
    @endif
</blockquote>