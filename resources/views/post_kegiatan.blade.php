@extends('layout/index')
@section('post_berita')
<h1>Buat Kegiatan</h1>
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <ul>
        <li>{{ $error }}</li>
        
    </ul>
    @endforeach
</div>
@endif
    <form action="/berita" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
       
        <div class="mb-3">
        <label for="body" class="form-label">Isi Kegiatan</label>
        <input id="body" type="hidden" name="body">
        <trix-editor class="trix-content" input="body" ></trix-editor>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image_berita" name="image_berita">
            <label class="input-group-text" for="iimage_berita">Upload</label>
          </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
