@extends('layout/index')
@section('artikel')
    <h1 class="text-dark fs-3 mb-4">Buat Artikel</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="card p-4">
        <form action="/artikel/update/{{$artikel->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title"
                    name="title" value="{{ $artikel->title }}">
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
                    @if ($artikel->category_artikel_id == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                       
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Deskripsi</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="body" id="editor">{{$artikel->body}}</textarea>
            </div>
            <a href="/artikel" class="btn btn-warning mt-2">Back</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/super-build/ckeditor.js"></script>

    <script src="/js/ckeditor.js"></script>
@endsection
