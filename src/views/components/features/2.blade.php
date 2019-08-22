<{{$el->getName()}}{!! $el->addClass('row')->attributes->render(true) !!}>
@foreach($el->payload->items as $item)
    <div class="col card-deck {{$item->classes ?? ''}}">
        <div class="card bg-primary text-center mb-4" data-background="color">
            @isset($item->heading)
                {!! cms()->createComponent()->heading($item->heading->tag)->payload($item->heading)->addClass('card-header bg-primary text-white h5') !!}
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
                    <a href="{{$item->link->href}}" class="btn btn-link btn-neutral btn-move-right stretched-link">
                        Mehr Infos
                        <i class="fas fa-caret-right ml-2"></i>
                    </a>
                </div>
            @endisset
        </div>
    </div>
@endforeach
</{{$el->getName()}}>
