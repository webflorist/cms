<section class="row justify-content-center pt-0">
    <div class="col col-md-8">
        @isset($el->payload->heading)
            {!! cms()->create()->heading()->payload($el->payload->heading) !!}
        @endisset
    </div>
    <div class="col col-12 mt-3">
        <{{$el->getName()}}{!! $el->addClass('row')->attributes->render(true) !!}>
        @foreach($el->payload->items as $item)
            <div class="col {{$item->classes ?? ''}}">
                <div class="card bg-primary text-center text-white mb-4 on-hover-up">
                    @isset($item->heading)
                        @isset($item->link)
                            <a href="{{$item->link->getHref()}}"
                               @if($item->link->hasTitle()) title="{{$item->link->getTitle()}}"
                               @endif class="stretched-link text-white text-decoration-none">
                                @endisset
                                {!! cms()->create()->heading($item->heading->tag)->payload($item->heading)->addClass('card-header bg-primary-dark h6') !!}
                                @isset($item->link)
                            </a>
                        @endisset
                    @endisset
                    <div class="card-body">
                        @isset($item->icon)
                            <i class="{{$item->icon}} fa-4x m-3"></i>
                        @endisset
                        @isset($item->content)
                            <p class="card-description text-white">
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

    </div>
</section>
