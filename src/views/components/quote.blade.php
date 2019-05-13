<blockquote{!! $el->attributes->render(true) !!}>
    <p class="m-b-0">{{$el->getData('text')}}</p>
    @if($el->hasData('footer'))
        <footer class="blockquote-footer">{{$el->getData('footer')}}</footer>
    @endif
</blockquote>