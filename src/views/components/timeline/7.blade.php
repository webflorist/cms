<div class="main-timeline7">
    @foreach($el->getData('items') as $item)
        <div class="timeline">

            <div class="timeline-icon">
                <i class="{{$item['icon']}}"></i>
            </div>

            <span class="year">{{$item['date']}}</span>

            <div class="timeline-content">

                @isset($item['heading'])
                    {!! cms()->createComponent()->heading($item['heading']) !!}
                @endisset

                @isset($item['text'])
                    <p class="description">
                        {{ $item['text'] }}
                    </p>
                @endisset

            </div>
        </div>
    @endforeach
</div>