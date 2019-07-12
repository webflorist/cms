<ul {!! $el->attributes->render(true) !!}>
    @foreach($el->getPayload('items') as $item)
        <li>
            <cite>
                {{ $item['author'] }}: {{ $item['title'] }} ({{ $item['year'] }})
                @isset($item['url'])
                    <br/>
                    <a href="{{ $item['url'] }}" target="_blank">{{ $item['url'] }}</a>
                @endisset
            </cite>
        </li>
    @endforeach
</ul>