<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" href="/img/cropped-logo.png" type="image/gif" >
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
    <section class="vh-100 bg-primary">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="register" method="post">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                          <span class="h1 fw-bold mb-0">HIMASI ADMIN</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="exampleInputname" class="form-label">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                                                name="name" required value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                                name="email" required value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"" id="exampleInputPassword1"
                                                name="password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword2" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2"
                                                name="password_confirmation">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/bootstrap.bundle.min.js"></script>
         <script src="https://kit.fontawesome.com/f10456a175.js" crossorigin="anonymous"></script>
</body>

</html>