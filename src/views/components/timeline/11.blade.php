<div class="main-timeline11">

    @foreach($el->payload->items as $item)

        <div class="timeline">

            <div class="timeline-content">

                <span class="year">{{$item['date']}}</span>

                <div class="inner-content">

                    @isset($item['heading'])
                        {!! cms()->create()->heading($item['heading']) !!}
                    @endisset

                    @isset($item['content'])
                        <p class="description">
                            {{ $item['content'] }}
                        </p>
                    @endisset

                </div>

            </div>

        </div>

    @endforeach

</div>
