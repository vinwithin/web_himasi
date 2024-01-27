@extends('layout/index')
@section('berita')
    <h1>{{$berita->title}}</h1>
    <p>Kategori : {{$berita->category_berita->name}}</p>
    <p>Author : {{$berita->user->name}}</p>
    <img class="img-fluid" src="/storage/{{$berita->image_berita}}" alt="" srcset="">
    {!! $berita->body !!}
@endsection