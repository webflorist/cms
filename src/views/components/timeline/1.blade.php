<div class="main-timeline1">

    @foreach($el->payload->get('items') as $item)

        <div class="timeline">

            <!--span class="year">{{$item['date']}}</span-->

            <div class="timeline-icon">
                @include('cms::components._partials.icon')
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