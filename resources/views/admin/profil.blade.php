@extends('layout/index')
@section('profil')
    <div class="container mt-5 ">

        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="active"> <a class="card-title fs-4 fw-bold mr-4" data-toggle="tab" href="#menu1">Profil</a></li>
                <li> <a class="card-title fs-4 fw-bold " data-toggle="tab" href="#menu2">Ubah Password</a></li>

            </ul>

        </div>
        <div class="tab-content">
        <div id="menu1" class="card tab-pane active">
            <div class="card-body text-center">
                <img class="img-profile rounded-circle mb-4" src="/img/undraw_profile.svg" style="max-width: 250px">
                <p class="text-center fs-5"><strong>Nama :</strong> {{ auth()->user()->name }}</p>
                <p class="text-center fs-5"><strong>Email :</strong> {{ auth()->user()->email }}</p>
                <p class="text-center fs-5"><strong>Role :</strong> {{ auth()->user()->role }}</p>
                <p class="text-center fs-5"><strong>Status :</strong>
                    {{ auth()->user()->active == 1 ? 'Aktif' : 'Tidak Aktif' }}</p><br>

            </div>
        </div>
        <div id="menu2" class="card tab-pane fade">
            <div class=" card-body ">
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Password Sebelumnya</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

            </div>
        </div>
    </div>
    </div>
@endsection
