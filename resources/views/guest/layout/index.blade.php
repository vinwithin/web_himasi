<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="HIMASI UNJA">
    <meta name="author" content="Ristek HIMASI">
    <title>HIMASI</title>
    <link rel="icon" href="/img/cropped-logo-si.png" type="image/gif">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets_guest/vendor/aos/aos.css" rel="stylesheet" />
    <link href="/assets_guest/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets_guest/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets_guest/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="/assets_guest/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/assets_guest/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="/assets_guest/css/style-artikel.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets_guest/css/style.css" rel="stylesheet" />
    <style>
        #header.header-transparent{
            background: rgba(55,142, 181, 0.9) !important;
        }
    </style>
</head>

<body>
   
    @include('guest/layout/navbar')
    @yield('content')
   
    {{-- <h1>hallo</h1> --}}
    @include('guest/layout/footer')
    <script src="/assets_guest/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets_guest/vendor/aos/aos.js"></script>
    <script src="/assets_guest/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets_guest/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets_guest/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets_guest/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets_guest/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets_guest/js/main.js"></script>
</body>

</html>
