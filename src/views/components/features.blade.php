@foreach($el->payload->get('items') as $item)
    <div class="{{$item->classes}} text-center">
        <div class="info">
            @isset($item->icon)
                <div class="icon icon-primary">
                    {!! icon_factory($item->icon) !!}
                </div>
            @endisset
            @isset($item->heading)
                {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClass('info-title') !!}
            @endisset
            @isset($item->content)
                <p>
                    @include('cms::components._partials.content', ['content' => $item->content, 'isHtml' => $item->isHtmlContent])
                </p>
            @endisset
        </div>
    </div>
@endforeach