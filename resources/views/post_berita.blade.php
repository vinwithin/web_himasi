@extends('layout/index')
@section('post_berita')
<h1>Buat Berita</h1>
{{-- @if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <ul>
        <li>{{ $error }}</li>
        
    </ul>
    @endforeach
</div>
@endif --}}
    <form action="/berita" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
        <label for="category_berita_id" class="form-label">Kategori</label>
        <select class="form-select" name="category_berita_id" id="category_berita_id">
          <option>-- Pilih Kategori --</option>
          @foreach ($category_berita as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
           
            @endforeach
          </select>
        </div>
        <div class="mb-3">
        <label for="body" class="form-label">Deskripsi</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body">
        <trix-editor class="trix-content" input="body" ></trix-editor>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control @error('image_berita') is-invalid @enderror" id="image_berita" name="image_berita">
            <label class="input-group-text" for="image_berita">Upload</label>
            @error('image_berita')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
