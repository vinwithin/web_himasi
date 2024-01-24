@extends('layout/index')
@section('post_berita')
<h1>Buat Berita</h1>
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
        <label for="category_berita_id" class="form-label">Kategori</label>
        <select class="form-select" name="category_berita_id" id="category_berita_id">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="mb-3">
        <label for="body" class="form-label">Isi Berita</label>
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
