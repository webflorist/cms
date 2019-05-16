<div class="main-timeline11">

    @foreach($el->getPayload('items') as $item)

        <div class="timeline">

            <div class="timeline-content">

                <span class="year">{{$item['date']}}</span>

                <div class="inner-content">

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

        </div>

    @endforeach

</div>