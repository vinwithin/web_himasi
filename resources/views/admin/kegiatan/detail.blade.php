@extends('layout/index')
@section('kegiatan')
<div class="card p-4 shadow">
    <h1>{{ $kegiatan->title }}</h1>
    {!! $kegiatan->body !!}
</div>
<div>
    <a href="/kegiatan" class="btn btn-warning mt-2">Back</a>
</div>
@endsection
