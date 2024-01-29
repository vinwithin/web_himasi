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
            @if (count($kegiatan) > 0)
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
                            <a href="kegiatan/detail/{{$post->slug}}" class="badge bg-info"><i class="fa-regular fa-eye"></i></a>
                            <a href="kegiatan/edit/{{$post->id}}" class="badge bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-trash"></i></a>
                            {{-- Modal hapus --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      Apakah anda yakin menghapus kegiatan ini?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                      <a href="/berita/delete/{{$post->id}}" class="btn btn-primary">Iya</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                    <tr>
                </tbody>
            </table>
            <div class="py-2 px-4 p-3">
                {{ $kegiatan->links() }}
            </div>
            @else 
                <p>no data</p>
            @endif
        </div>
    </div>
@endsection
