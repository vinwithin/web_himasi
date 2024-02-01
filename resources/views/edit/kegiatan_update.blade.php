@extends('layout/index')
@section('kegiatan')
    <h1 class="text-dark fs-3 mb-4">Buat Kegiatan</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="card p-4">
        <form action="/kegiatan/update/{{$kegiatan->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                     value="{{ $kegiatan->first()->title }}">
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
                <textarea name="body" id="editor" >{{$kegiatan->body}}</textarea>
            </div>
            
            <a href="/kegiatan" class="btn btn-warning mt-2">Back</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),
            {
                ckfinder:{
                    uploadUrl: "{{ route('ckeditor.kegiatan.upload', ['_token' => csrf_token() ]) }}",
                }
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
