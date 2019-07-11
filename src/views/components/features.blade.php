@foreach($el->getPayload('items') as $feature)
    <div class="{{$el->getPayload('item-classes')}} text-center">
        <div class="info">
            @isset($feature['icon'])
                <div class="icon icon-primary">
                    @include('cms::components._partials.icon')
                </div>
            @endisset
            @isset($feature['title'])
                <h3 class="info-title">{{$feature['title']}}</h3>
            @endisset
            @isset($feature['text'])
                <p>{{$feature['text']}}</p>
            @endisset
        </div>
    </div>
@endforeach