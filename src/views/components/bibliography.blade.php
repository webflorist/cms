<ul {!! $el->attributes->render(true) !!}>
    @foreach($el->payload->items as $item)
        <li class="media">
            @isset($item->icon)
                <div class="mr-3 icon text-primary">
                    {!! icon_factory($item->icon) !!}
                </div>
            @endisset
            <cite class="media-body">
                <p>
                    {{ $item->author }}: {{ $item->title }} ({{ $item->year }})
                    @isset($item->url)
                        <br/>
                        <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                    @endisset
                </p>
            </cite>
        </li>
    @endforeach
</ul>