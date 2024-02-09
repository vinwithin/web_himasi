@extends('layout/index')
@section('artikel')
    <div class="card p-4 ">
        <h1>{{ $artikel->title }}</h1>
        <p>Kategori : {{ $artikel->category_artikel->name }}</p>
        <p>Author : {{ $artikel->user->email }}</p>
        {{-- <img class="img-fluid" src="/storage/{{$artikel->image_artikel}}" alt="" srcset=""> --}}
        {!! $artikel->body !!}
    </div>
    <div>
        <a href="/artikel" class="btn btn-warning mt-2">Back</a>
    </div>
@endsection
