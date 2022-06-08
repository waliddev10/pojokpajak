<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pojok Pajak</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="...">
    <meta name="keywords" content="...">
    <meta name="author" content="Walid" />
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="overflow-x-hidden">
    <nav class="navbar navbar-expand-lg navbar-light py-4 navbar-nd d-flex">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('assets/img/logo-baru.svg') }}" width="50" height="50"
                    class="d-inline-block align-top me-5" alt="...">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="basic-menus navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tutorial
                        </a>
                        <ul class="dropdown-menu mega-menu-nd" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <li class="item-menu">
                                        <a class="dropdown-item" href="/catalog/design-courses">
                                            <img src="{{ asset('assets/img/ic_design.svg') }}" class="icon">
                                            <p class="title">
                                                Membuat NPWP
                                            </p>
                                            <p class="subtitle">
                                                Pembuatan secara online
                                            </p>
                                        </a>
                                    </li>
                                    <li class="item-menu">
                                        <a class="dropdown-item" href="/catalog/code-courses">
                                            <img src="{{ asset('assets/img/ic_appcode.svg') }}" class="icon">
                                            <p class="title">
                                                Pelaporan SPT
                                            </p>
                                            <p class="subtitle">
                                                Bagi Wajib Pajak
                                            </p>
                                        </a>
                                    </li>
                                    <li class="item-menu">
                                        <a class="dropdown-item" href="/catalog/softskills-courses">
                                            <img src="{{ asset('assets/img/ic_softskills.svg') }}" class="icon">
                                            <p class="title">
                                                Pembuatan Faktur Pajak
                                            </p>
                                            <p class="subtitle">
                                                Bagi Wajib Pajak Rekanan
                                            </p>
                                        </a>
                                    </li>
                                </div>
                                <div class="col-lg-6 col-12 right">
                                    <li class="item-menu">
                                        <a class="dropdown-item" href="/kelas">
                                            <img src="{{ asset('assets/img/ic_all_course.svg') }}" class="icon">
                                            <p class="title">
                                                Penggunaan E-Bupot
                                            </p>
                                            <p class="subtitle">
                                                Bendahara Instansi Pemerintah
                                            </p>
                                        </a>
                                    </li>
                                    <li class="item-menu">
                                        <a class="dropdown-item" href="/journey">
                                            <img src="{{ asset('assets/img/ic_flag.svg') }}" class="icon">
                                            <p class="title">
                                                Pembuatan Billing Pajak
                                            </p>
                                            <p class="subtitle">
                                                Setiap melakukan transaksi pajak
                                            </p>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('panduan/pamflet_pojok_pajak_1.pdf') }}">
                            Buku Panduan
                            <span class="ms-2 badge bg-primary">New</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3 wrap-btn-daftar">
                        <button class="btn btn-secondary btn-daftar d-none d-lg-block">Masuk</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-lg-block">
        <div class="ground-login gate px-2 px-lg-0">
            <div class="box-870">
                <div class="ic-close">
                    <img src="{{ asset('assets/img/ic_close.svg') }}" alt="close-icon" />
                </div>
                <div class="row mx-0">
                    <div class="col-md-6 col-12 showcase d-none d-md-block p-0">
                        <img src="{{ asset('assets/img/banner-login-popup.png') }}" class="banner-login">
                    </div>
                    <div class="col-md-6 col-12 p-5 content sign-in-form">
                        <h3 class="header-thirdty">
                            Masuk
                        </h3>
                        <div class="form-group p-0 mt-30">
                            <form action="{{  route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <input type="number" name="npwp" class="form-control" id="npwp" required>
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" required>
                                </div>
                                {{-- <p class="flr">
                                    <a href="https://class.buildwithangga.com/password/reset" class="text-link">Lupa
                                        Password</a>
                                </p> --}}
                                <div class="mb-2">
                                    <input class="d-inline" type="checkbox" name="remember" id="remember">
                                    <label class="d-inline" for="remember">Ingat saya</label>
                                </div>
                        </div>
                        <button type="submit" class="mt-4 btn btn-primary btn-lg">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="top-featured pt-100 pb-50">
        <div class="container-fluid">
            <div class="mb-4 row">
                <div class="text-left col-lg-10 col-12">
                    <div class="front-text-group">
                        <h2 class="header-primary mb-0">Kumpulan Video <br class="desktop"> Tutorial Pajak</h2>
                        <p class="capt"></p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 d-sm-flex">
                <div class="col-lg-3 col-12 col-sm-6">
                    <div class="course-card">
                        <img src="https://i3.ytimg.com/vi/NyAoNVVAnTo/maxresdefault.jpg" class="thumbnail-course"
                            style="height: 160px;"
                            alt="Kelas Full-Stack JavaScript Developer: Website Travel di BuildWith Angga" />
                        <div class="course-detail">
                            <div class="course-name">
                                Tutorial Pendaftaran NPWP Orang Pribadi secara Online
                                <a href="https://www.youtube.com/watch?v=NyAoNVVAnTo&ab_channel=DirektoratJenderalPajak"
                                    class="stretched-link">
                                </a>
                            </div>
                            <p>
                                <img height="25" width="25" src="{{ asset('assets/img/icon_youtube.svg') }}" />
                                <span>Tonton Sekarang</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 col-sm-6">
                    <div class="course-card">
                        <img src="https://i3.ytimg.com/vi/zn00tvtRRdY/maxresdefault.jpg" class="thumbnail-course"
                            style="height: 160px;"
                            alt="Kelas Full-Stack JavaScript Developer: Website Travel di BuildWith Angga" />
                        <div class="course-detail">
                            <div class="course-name">
                                Tutorial Pembayaran Pajak Menggunakan e-Billing
                                <a href="https://www.youtube.com/watch?v=zn00tvtRRdY&ab_channel=DirektoratJenderalPajak"
                                    class="stretched-link">
                                </a>
                            </div>
                            <p>
                                <img height="25" width="25" src="{{ asset('assets/img/icon_youtube.svg') }}" />
                                <span>Tonton Sekarang</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 col-sm-6">
                    <div class="course-card">
                        <img src="https://i3.ytimg.com/vi/UyDyAE8ji6o/maxresdefault.jpg" class="thumbnail-course"
                            style="height: 160px;"
                            alt="Kelas Full-Stack JavaScript Developer: Website Travel di BuildWith Angga" />
                        <div class="course-detail">
                            <div class="course-name">
                                Tutorial Mendapatkan EFIN Melalui Website DJP dan Email
                                <a href="https://www.youtube.com/watch?v=UyDyAE8ji6o&ab_channel=DirektoratJenderalPajak"
                                    class="stretched-link">
                                </a>
                            </div>
                            <p>
                                <img height="25" width="25" src="{{ asset('assets/img/icon_youtube.svg') }}" />
                                <span>Tonton Sekarang</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 col-sm-6">
                    <div class="course-card">
                        <img src="https://i3.ytimg.com/vi/jLSARSW3vzk/maxresdefault.jpg" class="thumbnail-course"
                            style="height: 160px;"
                            alt="Kelas Full-Stack JavaScript Developer: Website Travel di BuildWith Angga" />
                        <div class="course-detail">
                            <div class="course-name">
                                Tutorial Pengisian SPT 1770 S Melalui e-Filing
                                <a href="https://www.youtube.com/watch?v=jLSARSW3vzk&ab_channel=DirektoratJenderalPajak"
                                    class="stretched-link">
                                </a>
                            </div>
                            <p>
                                <img height="25" width="25" src="{{ asset('assets/img/icon_youtube.svg') }}" />
                                <span>Tonton Sekarang</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-nd">
        <div class="container-fluid">
            <div class="row">
                <div class="item-footer col-lg-3 col-10">
                    <img src="{{ asset('assets/img/logo-baru.svg') }}" width="50" height="50" alt="...">
                    <p class="mt-4 tagline">
                        Sistem Informasi Perpajakan
                    </p>
                    <p class="mt-4">
                        © 2022 Pojok Pajak
                    </p>
                </div>
                <div class="item-footer col-lg-1 col-12">
                </div>
                <div class="col-lg-8 col-12">
                    <div class="row justify-content-between">
                        <div class="item-footer col-lg-3 col-12">
                            <p class="header-category">
                                Pranala
                            </p>
                            <ul>
                                <li>
                                    <a href="https://rsjdahm.kaltimprov.go.id/">
                                        RSJD Atma Husada Mahakam
                                    </a>
                                </li>
                                <li>
                                    <a href="https://kaltimprov.go.id/">
                                        Provinsi Kalimantan Timur
                                    </a>
                                </li>
                                <li><a href="https://pajak.go.id/">
                                        Direktorat Jenderal Pajak
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {{-- <div class="item-footer col-lg-3 col-12">
                            <p class="header-category">
                                Resources
                            </p>
                            <ul>
                                <li>
                                    <a href="https://buildwithangga.com/handbook">HandBook</a>
                                </li>
                                <li>
                                    <a href="https://buildwithangga.com/digibook">DigiBook</a>
                                </li>
                                <li>
                                    <a href="https://buildwithangga.com/pixel">Pixel Assets</a>
                                </li>
                                <li>
                                    <a href="https://elements.buildwithangga.com/" target="_blank">Website Builder</a>
                                </li>
                            </ul>
                        </div>
                        <div class="item-footer col-lg-3 col-6">
                            <p class="header-category">
                                Mastering New Tools
                            </p>
                            <ul>
                                <li><a href="https://buildwithangga.com/search?keyword=Figma">Figma</a></li>
                                <li><a href="https://buildwithangga.com/search?keyword=Blender+3D">Blender 3D</a>
                                </li>
                                <li><a href="https://buildwithangga.com/search?keyword=Vue+JS">Vue JS</a></li>
                                <li><a href="https://buildwithangga.com/search?keyword=Adobe+XD">Adobe XD</a></li>
                                <li><a href="https://buildwithangga.com/search?keyword=React+JS">React JS</a></li>
                            </ul>
                        </div> --}}
                        <div class="item-footer col-lg-3 col-6">
                            <p class="header-category">
                                Kontak
                            </p>
                            <ul>
                                <li><a href="https://wa.me/6285157626557">WhatsApp</a></li>
                                <li><a href="https://t.me/mohwalidas">Telegram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
		$(".dropdown-toggle").dropdown();
	})

    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        $(document).ready(function () {
            $(".ground-login").css("display", "none");

            $("button.btn-daftar").click(function () {
                var redirect = $(this).attr('data-redirect') ?? '';

                $(".ground-login").find('#simple-signup-redirect').val(redirect);
                $(".ground-login").delay(300).fadeIn();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".ic-close").click(function () {
                $(".ground-login").fadeOut(300)
            })
        });
    </script>
</body>

</html>