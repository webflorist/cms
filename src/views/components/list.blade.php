<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
    @foreach($el->payload->get('items') as $item)
        <li class="media">
            @isset($item->icon)
                <div class="mr-3 icon icon-primary">
                    {!! icon_factory($item->icon) !!}
                </div>
            @endisset
            <div class="media-body">
                @isset($item->heading)
                    {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClasses(['mt-0', 'mb-1']) !!}
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