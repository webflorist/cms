<div class="cms-timeline-default-7">
    @foreach($el->payload->get('items') as $item)

        <div class="timeline">

            <div class="timeline-icon">
                @include('cms::components._partials.icon', ['icon' => $item->icon])
            </div>

            <span class="year">{{$item->date}}</span>

            <div class="timeline-content">

                @isset($item->heading)
                    {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading) !!}
                @endisset

                @isset($item->content)
                    <p class="description">
                        @include('cms::components._partials.content', ['content' => $item->content, 'isHtml' => $item->isHtmlContent])
                    </p>
                @endisset

            </div>
        </div>

    @endforeach
</div>