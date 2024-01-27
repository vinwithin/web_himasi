@extends('layout/index')
@section('berita')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <h1 class=" text-dark fs-3">Berita</h1>
    </div>
    <div class="card p-3">
        <div class="table-responsive col-lg-8">
            <a href="berita/create" class="btn btn-primary mb-3">Buat Berita</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $post)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category_berita->name }}</td>
                            <td>
                                <a href="" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="" class="badge bg-warning"><span data-feather="eye"></span></a>
                                <a href="" class="badge bg-danger"><span data-feather="eye"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
