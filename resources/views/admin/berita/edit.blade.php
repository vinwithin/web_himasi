@extends('layout/index')
@section('berita')
    <h1 class="text-dark fs-3 mb-4">Buat Berita</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="card p-4">
        <form action="/berita/perbarui/{{ $berita->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ $berita->title }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_berita_id" class="form-label">Kategori</label>
                <select class="form-select" name="category_berita_id" id="category_berita_id" required>
                    @foreach ($category_berita as $category)
                        @if ($berita->category_berita_id == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('image_berita') is-invalid @enderror" id="image_berita"
                    name="image_berita" accept="jpg,png" >
                <label class="input-group-text" for="image_berita">Upload Thumbnails</label>
                @error('image_berita')
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
                <textarea name="body" id="editor">{{ $berita->body }}</textarea>
            </div>

            <a href="/berita" class="btn btn-warning mt-2">Back</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/ckeditor.js"></script>

    <script src="/js/ckeditor.js"></script>
@endsection
