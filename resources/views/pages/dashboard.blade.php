@extends('layouts.app')

@section('title', 'Bukti Potong PPh 21 Final')

@section('desktop_content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-primary mb-3">
                Beranda
            </h1>
            {{-- <p class="subtitle-primary">
                Rangkuman informasi perpajakan <br class="desktop"> terbaru saat ini
            </p> --}}
        </div>
    </div>
    <div class="row my-3">
        <div class="tabs-content-nd overflow-hidden">
            <ul class="nav nav-pills mb-5 d-flex flex-wrap gap-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Bukti Potong</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-tools-tab" data-bs-toggle="pill" data-bs-target="#pills-tools"
                        type="button" role="tab" aria-controls="pills-tools" aria-selected="false">Kanal
                        Informasi</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fadeshow active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row mt-5 pricing testimonials mentors" id="reviews">
                        <div class="col-lg-4 col-sm-6 col-12 mb-3">
                            <div class="item-pricing item-mentor position-relative">
                                <div class="featured-course">
                                    <img src="{{ asset('assets/img/thumb_bupot.png') }}" class="cover img-fluid"
                                        alt="...">
                                </div>
                                <h2 class="name mt-4 line-clamp text-capitalize">
                                    Bupot PPh 21 Final
                                    <a href="{{ route('bupot-pph21-final.index') }}" class="stretched-link">
                                    </a>
                                </h2>
                                <p class="role mb-0 d-lg-block d-none">
                                    Pajak Penghasilan
                                </p>
                                <div class="item-two-row d-flex align-items-center mt-4">
                                    <img src="https://class.buildwithangga.com/themes/front/images/ic_check.svg"
                                        class="icon">
                                    <p class="text-medium mb-0">
                                        Selengkapnya
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12 mb-3">
                            <div class="item-pricing item-mentor position-relative">
                                <div class="featured-course">
                                    <img src="{{ asset('assets/img/thumb_bupot.png') }}" class="cover img-fluid"
                                        alt="...">
                                </div>
                                <h2 class="name mt-4 line-clamp text-capitalize">
                                    Bupot Unifikasi
                                    <a href="{{ route('bupot-pph-unifikasi.index') }}" class="stretched-link">
                                    </a>
                                </h2>
                                <p class="role mb-0 d-lg-block d-none">
                                    Pajak Penghasilan
                                </p>
                                <div class="item-two-row d-flex align-items-center mt-4">
                                    <img src="https://class.buildwithangga.com/themes/front/images/ic_check.svg"
                                        class="icon">
                                    <p class="text-medium mb-0">
                                        Selengkapnya
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
                    <div class="row mt-5 pricing testimonials mentors" id="reviews">
                        <div class="col-lg-12 col-12 text-center">
                            <img src="https://class.buildwithangga.com/images/website_thumbnail.svg"
                                alt="BuildWith Angga" class="img-fluid" />
                            <p class="my-4 py-1 text-medium lh-lg">
                                Hubungkan aplikasi melalui
                                Telegram.
                            </p>
                            <a href="https://web.telegram.org/k/" class="btn btn-primary btn-block">Buka Telegram</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('mobile_content')
<div class="pb-5 mb-5">
    <div class="row header-wrapper mb-3">
        <div class="col-lg-12">
            <h1 class="header mb-3">
                Beranda
            </h1>
            <p class="subtitle">
                Rangkuman informasi perpajakan <br class="desktop"> terbaru saat ini
            </p>
        </div>
    </div>
    <div class="row mb-60">
        <div class="tabs-content-nd">
            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-allcm-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-allcm" type="button" role="tab" aria-controls="pills-allcm"
                        aria-selected="true">Bukti Potong</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-startercm-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-startercm" type="button" role="tab" aria-controls="pills-startercm"
                        aria-selected="false">Kanal Informasi</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fadeshow active" id="pills-allcm" role="tabpanel"
                    aria-labelledby="pills-allcm-tab">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="basic-course-card d-flex align-items-center position-relative">
                                <img src="{{ asset('assets/img/thumb_bupot.png') }}"
                                    class="cover position-absolute h-100">
                                <div class="info w-100 ml-126 pe-2">
                                    <h2>
                                        Bupot PPh 21 Final
                                    </h2>
                                    <div class="type d-flex align-items-center">
                                        <img src="https://class.buildwithangga.com/themes/front/images/ic_check.svg"
                                            class="icon">
                                        <p class="duration">
                                            Pajak Penghasilan
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('bupot-pph21-final.index') }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-startercm" role="tabpanel" aria-labelledby="pills-startercm-tab">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="text-center">
                                <img src="https://class.buildwithangga.com/images/website_thumbnail.svg"
                                    alt="BuildWith Angga" class="img-fluid" />
                                <p class="my-4 py-1 text-medium lh-lg">
                                    Hubungkan aplikasi melalui
                                    Telegram.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection