<{{$el->getName()}}{!! $el->attributes->render(true) !!}>
@foreach($el->payload->items as $item)
    <li class="media">
        @isset($item->icon)
            <div class="mr-3 icon text-primary">
                <i class="{{$item->icon}}"></i>
            </div>
        @endisset
        <div class="media-body position-relative">
            @isset($item->link)
                <a href="{{$item->link->href}}" @isset($item->link->target) target="{{$item->link->target}}" @endif>
                    @if(isset($item->content))
                        @include('cms::components._partials.text', ['text' => $item->content, 'isHtml' => $item->isHtmlContent])
                    @elseif(isset($item->link->title))
                        {{$item->link->title}}
                    @else
                        {{$item->link->href}}
                    @endif
                </a>
            @endisset
        </div>
    </li>
@endforeach
</{{$el->getName()}}>
