@extends('layout/index')
@section('berita')
    <h1 class="text-dark">{{$berita->title}}</h1>
    <p class="text-dark">Kategori : {{$berita->category_berita->name}}</p>
    <p class="text-dark">Author : {{$berita->user->name}}</p>
    <div class="">
    {!! $berita->body !!}
</div>
@endsection