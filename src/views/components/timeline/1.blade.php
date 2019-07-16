<div class="main-timeline1">

    @foreach($el->payload->items as $item)

        <div class="timeline">

            <!--span class="year">{{$item['date']}}</span-->

            <div class="timeline-icon">
                @include('cms::components._partials.icon')
            </div>

            <div class="timeline-content">

                @isset($item['heading'])
                    {!! cms()->createComponent()->heading($item['heading']) !!}
                @endisset

                @isset($item['content'])
                    <p class="description">
                        {{ $item['content'] }}
                    </p>
                @endisset

            </div>
        </div>

    @endforeach

</div>