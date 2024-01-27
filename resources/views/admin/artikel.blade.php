@extends('layout/index')
@section('artikel')
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex mb-3">
        <h1 class=" text-dark fs-3">Artikel</h1>
    </div>
    <div class="card p-3">
        <div class="table-responsive col-lg-8">

            <a href="artikel/create" class="btn btn-primary mb-3">Buat Artikel</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($artikel as $post)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category_artikel->name }}</td>
                        <td>
                            <a href="artikel/detail/{{$post->slug}}" class="badge bg-info"><i class="fa-regular fa-eye"></i></a>
                            <a href="" class="badge bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" class="badge bg-danger"><i class="fa-regular fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
