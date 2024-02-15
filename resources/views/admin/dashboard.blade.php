@extends('layout/index')
@section('dashboard')
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                   <h5 class="card-title"> <span><i class="fa-regular fa-book mr-2"></i></span>Artikel</h5>
                    <p class="card-text">Jumlah artikel yang sudah dibuat : {{ count($artikel) }}</p>
                    <a href="artikel/buat" class="btn btn-primary">Buat Artikel</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><span> <i class="fa-regular fa-newspaper mr-2"></i></span>Berita</h5>
                    <p class="card-text">Jumlah berita yang sudah dibuat : {{ count($berita) }}</p>
                    <a href="berita/buat" class="btn btn-primary">Buat Berita</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><span> <i class="fa-regular fa-calendar-plus mr-2 "></i></span>Kegiatan</h5>
                    <p class="card-text">Jumlah kegiatan yang sudah dibuat : {{ count($kegiatan) }}</p>
                    <a href="kegiatan/buat" class="btn btn-primary">Buat Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
