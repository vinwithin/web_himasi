@extends('layout/index')
@section('profil')
    <div class="container mt-5 ">
        <div class="card-header">
            <a class="card-title fs-4 fw-bold mr-4">Profil</a>
        </div>
        <div class="tab-content">
            <div class="card ">
                <div class="card-body text-center">
                    <img class="img-profile rounded-circle mb-4" src="/img/undraw_profile.svg" style="max-width: 250px">
                    <p class="text-center fs-5"><strong>Nama :</strong> {{ auth()->user()->name }}</p>
                    <p class="text-center fs-5"><strong>Email :</strong> {{ auth()->user()->email }}</p>
                    <p class="text-center fs-5"><strong>Role :</strong> {{ auth()->user()->role }}</p>
                    <p class="text-center fs-5"><strong>Status :</strong>
                        {{ auth()->user()->active == 1 ? 'Aktif' : 'Tidak Aktif' }}</p><br>

                </div>

                <hr class="border border-primary border-3 opacity-75">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class=" card-body ">
                    <h5 class="card-title fs-4 fw-bold mb-4">Ubah Password</h5>
                    <form id="changePasswordForm" method="POST" action="/profil/ubah-password">
                        @csrf
                        <div class="mb-3">
                            <label for="prev" class="form-label">Password Sebelumnya</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                id="prev" name="old_password" required>
                            @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="newpassword" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="newpassword" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
        //     let change = document.document.getElementById("change");
        //     let menu2 = document.document.getElementById("menu2");
        //   function change_password(){
        //     menu2.className +="active ";
        //   }
    </script>
@endsection
