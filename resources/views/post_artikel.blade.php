@extends('layout/index')
@section('post_artikel')
<h1>Buat Artikel</h1>
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <ul>
        <li>{{ $error }}</li>
        
    </ul>
    @endforeach
</div>
@endif
    <form action="/artikel" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
        <label for="category_artikel_id" class="form-label">Kategori</label>
        <select class="form-select" name="category_artikel_id" id="category_artikel_id">
            <option>-- Pilih Kategori --</option>
            @foreach ($category_artikel as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            
          </select>
        </div>
        <div class="mb-3">
        <label for="body" class="form-label">Isi Artikel</label>
        <input id="body" type="hidden" name="body">
        <trix-editor class="trix-content" input="body" ></trix-editor>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image_artikel" name="image_artikel">
            <label class="input-group-text" for="image_artikel">Upload</label>
          </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
