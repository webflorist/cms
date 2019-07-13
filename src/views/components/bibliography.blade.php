<ul {!! $el->attributes->render(true) !!}>
    @foreach($el->payload->get('items') as $item)
        <li class="media">
            @isset($item->icon)
                <div class="mr-3 icon icon-primary">
                    @include('cms::components._partials.icon', ['icon' => $item->icon])
                </div>
            @endisset
            <cite class="media-body">
                {{ $item->author }}: {{ $item->title }} ({{ $item->year }})
                @isset($item->url)
                    <br/>
                    <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                @endisset
            </cite>
        </li>
    @endforeach
</ul>