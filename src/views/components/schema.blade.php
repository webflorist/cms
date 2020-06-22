@php
    /** @var \Webflorist\Cms\Components\SchemaComponent $el */
@endphp
<script type="application/ld+json">
    {!! json_encode($el->payload->toJson()) !!}
</script>
