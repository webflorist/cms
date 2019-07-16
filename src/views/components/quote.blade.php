<blockquote{!! $el->attributes->render(true) !!}>
    <p class="m-b-0">{{$el->payload->content}}</p>
    @isset($el->payload->footer)
        <footer class="blockquote-footer">{{$el->payload->footer}}</footer>
    @endisset
</blockquote>