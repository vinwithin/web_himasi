@extends('layout/index')
@section('artikel')
<h1>Buat Artikel</h1>
    <form action="/artikel" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" required value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
        <label for="category_artikel_id" class="form-label">Kategori</label>
        @error('category_artikel_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <select class="form-select" name="category_artikel_id" id="category_artikel_id" required>
            @foreach ($category_artikel as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
        <label for="body" class="form-label">Deskripsi</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor class="trix-content" input="body" ></trix-editor>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control @error('image_artikel') is-invalid @enderror" id="image_artikel" name="image_artikel">
            <label class="input-group-text" for="image_artikel">Upload</label>
            @error('image_artikel')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
