@extends('layouts.app')

@section('desktop_content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-primary mb-3">
                Impor Daftar User
            </h1>
            <p class="subtitle-primary">
                File import berupa Excel - <a href="{{ asset('form_isian/Form-input-user.xls') }}">Download Form
                    Isian</a>
            </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 col-12">
            <div class="form-group default-card">
                <form id="login" action="https://class.buildwithangga.com/save_profile?" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="file" id="file" class="file_upload avatar-image"
                            accept="application/xls, application/xlsx">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="w-100 mt-2 btn btn-primary btn-lg">Upload Berkas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('mobile_content')
<div class="pb-5 mb-5">
    <div class="row header-wrapper text-center mb-3">
        <div class="col-12">
            <img src="https://class.buildwithangga.com/themes/front/images/ic_no_support_device.svg"
                class="my-5 img-fluid">
            <h1 class="header mb-3">
                Pengaturan
            </h1>
            <p class="subtitle">
                Halaman ini hanya dapat diakses melalui tampilan Desktop
            </p>
            <a class="btn btn-primary my-3" href="{{ route('dashboard.index') }}">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<style type="text/css">
    table.dataTable {
        margin-top: 12px !important;
        margin-bottom: 16px !important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: flex-start !important;
    }

    div.dataTables_wrapper div.dataTables_info {
        padding: 0px !important;
    }

    div.table-responsive>div.dataTables_wrapper>div.row {
        align-items: center;
    }
</style>
@endpush