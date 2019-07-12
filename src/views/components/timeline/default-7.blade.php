<div class="cms-timeline-default-7">
    @foreach($el->getPayload('items') as $item)

        <div class="timeline">

            <div class="timeline-icon">
                @include('cms::components._partials.icon', ['icon' => $item['icon']])
            </div>

            <span class="year">{{$item['date']}}</span>

            <div class="timeline-content">

                @isset($item['heading'])
                    {!! cms()->createComponent()->heading($item['heading']['tag'])->payload($item['heading']['payload']) !!}
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