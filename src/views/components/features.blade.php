@php
    /** @var \Webflorist\Cms\Components\FeaturesComponent $el */
    $el->addClass('row p-0 justify-content-center');
    $el->layout('wide');
@endphp

@component('cms::components._default.section', ['el' => $el])
    {!! $el->renderStartTag() !!}

    @foreach($el->payload->items as $item)
        <div class="col col-12 col-md-6 col-lg-5 col-xl-4">
            <div class="card text-center bg-primary mb-4 on-hover-up">
                <h3 class="card-header bg-primary-dark h6">
                    {!! cms()->create()->link()->toRouteNode($item->node)
                            ->addClass('stretched-link text-white text-decoration-none')
                            ->content(route_node($item->node)->payload->h1)!!}
                </h3>
                <div class="card-body bg-white bg-wiese d-flex flex-xl-column align-items-center p-4">
                    <i class="{{route_node($item->node)->payload->icon}} fa-4x mr-3 mb-xl-3 text-primary-dark"></i>
                    <p class="text-justify text-base">
                        {{$item->content}}
                    </p>
                </div>
                <div class="card-footer bg-primary text-white">
                    Mehr Infos
                    <i class="fas fa-caret-right ml-2"></i>
                </div>
            </div>
        </div>
    @endforeach

    {!! $el->renderEndTag() !!}
@endcomponent
