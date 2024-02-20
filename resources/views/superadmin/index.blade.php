@extends('admin/layout/index')
@section('manage_user')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex mb-3">
        <h1 class=" text-dark fs-3">Daftar Pengguna</h1>
    </div>
    <div class="d-flex card shadow p-3">



        <div class="table-responsive col-lg-8 ">

            <form action="/artikel" method="get" class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            @if (count($users) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="/master/hapus/{{$user->id}}" class="badge bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i
                                        class="fa-regular fa-trash"></i></a>
                                <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="1"
                                    aria-labelledby="exampleModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $user->id }}">
                                                    Konfirmasi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin menghapus artikel ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                                <a href="/master/hapus/{{ $user->id }}"
                                                    class="btn btn-primary">Iya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
            @endforeach
            </tr>
            </tbody>
            </table>
        @else
            <div class="alert alert-light" role="alert">
                Tidak ada data!
            </div>
            @endif
        </div>

    </div>
@endsection
