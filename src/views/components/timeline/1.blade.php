<div class="main-timeline1">

    @foreach($el->getPayload('items') as $item)

        <div class="timeline">

            <!--span class="year">{{$item['date']}}</span-->

            <div class="timeline-icon">
                <i class="{{$item['icon']}}"></i>
            </div>

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