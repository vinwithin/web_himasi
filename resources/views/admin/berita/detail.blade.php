@extends('admin/layout/index')
@section('berita')
<div class="card p-4 shadow">
    <h1 class="text-dark">{{$berita->title}}</h1>
    <p class="text-dark">Kategori : {{$berita->category_berita->name}}</p>
    <p class="text-dark">Author : {{!$berita->user->name ?  'Ristek Himasi' : $berita->user->name }} </p>
    {!! $berita->body !!}

</div>
<div>
    <a href="/berita" class="btn btn-warning mt-2">Back</a>
</div>
@endsection