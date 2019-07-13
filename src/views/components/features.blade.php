@foreach($el->payload->get('items') as $item)
    <div class="{{$item->classes}} text-center">
        <div class="info">
            @isset($item->icon)
                <div class="icon icon-primary">
                    @include('cms::components._partials.icon', ['icon' => $item->icon])
                </div>
            @endisset
            @isset($item->title)
                <h3 class="info-title">{{$item->title}}</h3>
            @endisset
            @isset($item->content)
                <p>
                    @include('cms::components._partials.content', ['content' => $item->content, 'isHtml' => $item->isHtmlContent])
                </p>
            @endisset
        </div>
    </div>
@endforeach