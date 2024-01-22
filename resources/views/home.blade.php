@extends('layout/index')
@section('createberita')
<h1>Buat Berita</h1>
    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="mb-3">
        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <input id="body" type="hidden" name="body">
        <trix-editor input="body"></trix-editor>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
