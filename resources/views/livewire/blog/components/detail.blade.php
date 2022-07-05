@if ($val->type->name_type == 'Image')
{{-- image --}}
<div class="my-4">
    <img src="{{ asset('storage/'.$val->contents) }}" class="img-fluid rounded mx-auto d-block" alt="">
</div>
@endif

@if ($val->type->name_type == 'Heading')
{{-- heading --}}
<div class="my-4">
    <h2>{{ $val->contents }}</h2>
</div>
@endif

@if ($val->type->name_type == 'Teks')
{{-- text --}}
<div class="my-4">
    <h5 class="text-justify" style="line-height:28px; color: #292929 !important; font-weight: 100 !important;">
        {!! nl2br($val->contents) !!}
    </h5>
</div>
@endif

@if ($val->type->name_type == 'Link')
{{-- link --}}
@php
    $data = json_decode($val->contents);
@endphp

<div class="my-4">
    <a href="{{ $data->link }}" class="btn btn-outline-primary"><i class="fas fa-link"></i> {{ $data->name }}</a>
</div>
@endif

@if ($val->type->name_type == 'Video')
{{-- video --}}
@php
    $pisah = explode("watch?v=",$val->contents);
@endphp

<div class="my-4">
    <div class="o-video">
        <iframe src="https://www.youtube.com/embed/{{ $pisah[1] }}?&showinfo=0&modestbranding=1&rel=0&autohide=1" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
@endif
