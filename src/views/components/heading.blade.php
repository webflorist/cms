{!! $el->renderStartTag() !!}
    @include('cms::components._partials.text', ['text' => $el->payload->title, 'isHtml' => $el->payload->isHtmlTitle])
    @if(isset($el->payload->subtitle))
        <span class="d-block text-muted small">{{$el->payload->subtitle}}</span>
    @endif
{!! $el->renderEndTag() !!}
