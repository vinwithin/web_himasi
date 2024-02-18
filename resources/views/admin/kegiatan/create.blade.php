@extends('layout/index')
@section('kegiatan')
    <h1 class="text-dark fs-3 mb-4">Buat Kegiatan</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="card p-4 shadow">
        <form action="/kegiatan/buat" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('image_kegiatan') is-invalid  @enderror"
                    id="image_kegiatan" name="image_kegiatan" >
                <label class="input-group-text" for="image_kegiatan">Upload Thumbnails</label>
                @error('image_kegiatan')
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
                <textarea name="body" id="editor"></textarea>
            </div>

            <a href="/kegiatan" class="btn btn-warning mt-2">Back</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/ckeditor.js"></script>

    <script src="/js/ckeditor.js"></script>
@endsection
