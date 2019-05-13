@foreach($el->getData('features') as $feature)
    <div class="{{$el->getData('item-classes')}} text-center">
        <div class="info">
            @isset($feature['icon'])
                <div class="icon icon-primary">
                    <i class="fas fa-{{$feature['icon']}}"></i>
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