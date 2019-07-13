<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    @foreach($el->payload->get('items') as $item)
        <li class="media">
            @isset($item->icon)
                <div class="mr-3 icon icon-primary">
                    @include('cms::components._partials.icon', ['icon' => $item->icon])
                </div>
            @endisset
            <div class="media-body">
                @isset($item->title)
                    <h3 class="info-title">{{$item->title}}</h3>
                @endisset
                @isset($item->content)
                    <p>
                        @include('cms::components._partials.content', ['content' => $item->content, 'isHtml' => $item->isHtmlContent])
                    </p>
                @endisset
            </div>
        </li>
    @endforeach
</{{$el->getName()}}>