<div class="cms-timeline-default-7">
    @foreach($el->payload->items as $item)

        <div class="timeline">

            <div class="timeline-icon">
                <i class="{{$item->icon}}"></i>
            </div>

            <span class="year">{{$item->date}}</span>

            <div class="timeline-content">

                @isset($item->heading)
                    {!! cms()->create()->heading($item->heading->tag)->payload($item->heading) !!}
                @endisset

                @isset($item->content)
                    <p class="description">
                        @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
                    </p>
                @endisset

            </div>
        </div>

    @endforeach
</div>
