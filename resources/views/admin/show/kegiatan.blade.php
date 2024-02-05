@extends('layout/index')
@section('kegiatan')
<div class="card p-4 shadow">
    <h1>{{ $kegiatan->title }}</h1>
    <img class="img-fluid" src="/storage/{{ $kegiatan->image_kegiatan }}" alt="" srcset="">
    {!! $kegiatan->body !!}
</div>
<div>
    <a href="/kegiatan" class="btn btn-warning mt-2">Back</a>
</div>
@endsection
