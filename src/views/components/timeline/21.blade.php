<div class="main-timeline21">
    @foreach($el->getPayload('items') as $item)

        <div class="timeline">

            <span class="timeline-icon"></span>

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

            <div class="icon">
                <i class="{{$item['icon']}}"></i>
                <span class="year">{{$item['date']}}</span>
            </div>

        </div>

    @endforeach
</div>