<div class="main-timeline">
    @foreach($el->getData('items') as $item)

        <div class="timeline">
            <span class="timeline-icon"></span>
            <div class="timeline-content">
                @isset($item['heading'])
                    {!! cms()->createComponent()->heading($item['heading']) !!}
                @endisset
                <p class="description">
                    Betreuung von Kindern und psychisch belasteten Personen.
                </p>
            </div>
            <div class="icon">
                <i class="{{$item['icon']}}"></i>
                <span class="year">{{$item['date']}}</span>
            </div>
        </div>

    @endforeach
</div>