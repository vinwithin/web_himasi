@extends('layout/index')
@section('kegiatan')
    <h1>{{ $kegiatan->title }}</h1>
    <img class="img-fluid" src="/storage/{{ $kegiatan->image_kegiatan }}" alt="" srcset="">
    {!! $kegiatan->body !!}
@endsection
