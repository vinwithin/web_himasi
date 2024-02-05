@extends('layout/index')
@section('artikel')
    <h1 class="text-dark fs-3 mb-4">Buat Artikel</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="card p-4 shadow">
        <form action="/artikel/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title"
                    name="title" value="{{ old('title') }}">
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
                    <option value="" selected="selected" hidden="hidden">Pilih Kategori</option>
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
                {{-- <input id="body" type="hidden" name="body" value="{{ old('body') }}"> --}}
                <textarea name="body" id="editor"></textarea>
            </div>

            <a href="/artikel" class="btn btn-warning mt-2">Back</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/ckeditor.js"></script>

    <script src="/js/ckeditor.js"></script>
@endsection
