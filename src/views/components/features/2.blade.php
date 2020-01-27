<{{$el->getName()}}{!! $el->addClass('row')->attributes->render(true) !!}>
@foreach($el->payload->items as $item)
    <div class="col {{$item->classes ?? ''}}">
        <div class="card bg-primary text-center text-white mb-4 on-hover-up">
            @isset($item->heading)
                @isset($item->link)
                    <a href="{{$item->link->href}}" class="stretched-link text-white text-decoration-none">
                @endisset
                        {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClass('card-header bg-primary-dark h6') !!}
                @isset($item->link)
                    </a>
                @endisset
            @endisset
            <div class="card-body">
                @isset($item->icon)
                    {!! icon_factory($item->icon)->addClass('fa-4x') !!}
                @endisset
                @isset($item->content)
                    <p class="card-description">
                        @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
                    </p>
                @endisset
            </div>
            @isset($item->link)
                <div class="card-footer">
                        Mehr Infos
                        <i class="fas fa-caret-right ml-2"></i>
                </div>
            @endisset
        </div>
    </div>
@endforeach
</{{$el->getName()}}>
