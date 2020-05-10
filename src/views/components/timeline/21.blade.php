<div class="main-timeline21">
    @foreach($el->payload->items as $item)

        <div class="timeline">

            <span class="timeline-icon"></span>

            <div class="timeline-content">

                @isset($item['heading'])
                    {!! cms()->create()->heading($item['heading']) !!}
                @endisset

                @isset($item['content'])
                    <p class="description">
                        {{ $item['content'] }}
                    </p>
                @endisset

            </div>

            <div class="icon">
                @include('cms::components._partials.icon')
                <span class="year">{{$item['date']}}</span>
            </div>

        </div>

    @endforeach
</div>
