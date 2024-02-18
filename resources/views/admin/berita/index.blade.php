@extends('layout/index')
@section('berita')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has("slugerror"))
        <div class="alert alert-danger" role="alert">
            {{ session('slugerror') }}
        </div>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <h1 class=" text-dark fs-3">Berita</h1>
    </div>
    <div class="card p-3 shadow">
        <div class="table-responsive col-lg-10">
            <a href="/berita/buat" class="btn btn-primary mb-3">Buat Berita</a>

            <form action="/berita" method="get" class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                        name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            @if (count($berita) > 0)
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
                    @foreach ($berita as $post)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category_berita->name }}</td>
                            <td>
                                <a href="berita/detail/{{$post->slug}}" class="badge bg-info"><i class="fa-regular fa-eye"></i></a>
                                <a href="berita/sunting/{{$post->slug}}" class="badge bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->slug}}"><i class="fa-solid fa-trash-can"></i></a>
                                {{-- Modal hapus --}}
                                <div class="modal fade" id="exampleModal{{$post->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$post->slug}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Apakah anda yakin menghapus berita ini?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                          <a href="/berita/hapus/{{$post->slug}}" class="btn btn-primary">Iya</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
               
            </table>
            <div class="py-2 px-4 p-3">
                {{ $berita->links() }}
            </div>
            @else 
                
            <div class="alert alert-light" role="alert">
                Tidak ada data!
              </div>
                
            @endif
        </div>
       
    </div>
    {{-- modal --}}
   
     
@endsection
