@extends('layout/index')
@section('artikel')
<h1>{{$artikel->title}}</h1>
<p>Kategori : {{$artikel->category_artikel->name}}</p>
<p>Author : {{$artikel->user->name}}</p>
<img class="img-fluid" src="/storage/{{$artikel->image_artikel}}" alt="" srcset="">
{!! $artikel->body !!}
@endsection