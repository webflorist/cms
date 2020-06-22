@php
    /** @var \Webflorist\Cms\Components\BibliographyComponent $el */
    $el->addClass('row justify-content-center mb-3');
@endphp

{!! $el->renderStartTag() !!}
<div class="col col-md-8">

    @isset($el->payload->heading)
        {!! cms()->create()->heading()->payload($el->payload->heading) !!}
    @endisset

    <ul>
        @foreach($el->payload->items as $item)
            <li class="media">
                <div class="mr-3 icon text-primary">
                    <i class="fas fa-bookmark"></i>
                </div>
                <cite class="media-body">
                    <p>
                        {{ $item->author }}: {{ $item->title }} ({{ \Carbon\Carbon::parse($item->year)->format('Y') }})
                        @isset($item->url)
                            <br/>
                            <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                        @endisset
                    </p>
                </cite>
            </li>
        @endforeach
    </ul>

</div>
{!! $el->renderEndTag() !!}
