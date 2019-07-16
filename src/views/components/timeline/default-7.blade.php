<div class="cms-timeline-default-7">
    @foreach($el->payload->items as $item)

        <div class="timeline">

            <div class="timeline-icon">
                {!! icon_factory($item->icon) !!}
            </div>

            <span class="year">{{$item->date}}</span>

            <div class="timeline-content">

                @isset($item->heading)
                    {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading) !!}
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