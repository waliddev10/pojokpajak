@extends('layouts.app')

@section('desktop_content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-primary mb-3">
                Impor Data
            </h1>
            <p class="subtitle-primary">
                Menu Khusus Administrator
            </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-10 col-12">
            <div class="default-card">
                <div class="table-responsive pb-3">
                    <table class="table align-middle text-left datatables">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Ekstensi</th>
                                <th scope="col">Sumber</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Daftar Bukti Potong
                                </td>
                                <td>
                                    XLS
                                </td>
                                <td>
                                    DJP Online
                                </td>
                                <td>
                                    <a class="btn btn-success"><i data-feather="upload-cloud" class="icon"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Berkas Bukti Potong
                                </td>
                                <td>
                                    ZIP (Berisi PDF)
                                </td>
                                <td>
                                    DJP Online
                                </td>
                                <td>
                                    <a class="btn btn-success"><i data-feather="upload-cloud" class="icon"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Daftar Pengguna
                                </td>
                                <td>
                                    XLS
                                </td>
                                <td>
                                    DUK
                                </td>
                                <td>
                                    <a href="{{ route('import.user') }}" class="btn btn-success"><i
                                            data-feather="upload-cloud" class="icon"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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