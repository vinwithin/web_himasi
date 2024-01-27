@extends('layout/index')
@section('kegiatan')
<h1>Buat Kegiatan</h1>
    <form action="/kegiatan" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
       
        <div class="mb-3">
        <label for="body" class="form-label">Deskripsi</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
        <trix-editor class="trix-content" input="body" ></trix-editor>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control @error('image_kegiatan') is-invalid  @enderror" id="image_kegiatan" name="image_kegiatan" required>
            <label class="input-group-text" for="image_kegiatan">Upload</label>
            @error('image_kegiatan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
