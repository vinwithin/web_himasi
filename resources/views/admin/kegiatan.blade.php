@extends('layout/index')
@section('kegiatan')
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <h1 class=" text-dark fs-3">Kegiatan</h1>
    </div>
    <div class="card p-3 ">
        <div class="table-responsive col-lg-6">
            <a href="kegiatan/create" class="btn btn-primary mb-3">Buat Kegiatan</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($kegiatan as $post)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="" class="badge bg-info"><i class="fa-regular fa-eye"></i></a>
                            <a href="" class="badge bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" class="badge bg-danger"><i class="fa-regular fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                    <tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
