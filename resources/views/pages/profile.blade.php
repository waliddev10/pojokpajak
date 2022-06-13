@extends('layouts.app')

@section('desktop_content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-primary mb-3">
                Profil Saya
            </h1>
            {{-- <p class="subtitle-primary">
                Masukkan informasi yang valid <br class="desktop"> agar proses belajar lebih mudah
            </p> --}}
        </div>
    </div>
    <div class="row basic-form mt-4">
        <div class="col-lg-5 col-12">
            <div class="form-group default-card">
                <form id="login" action="https://class.buildwithangga.com/save_profile?" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="cCp6NL51bvbzI31fHVigMzPSDRstErHjjB1RQxPs">
                    {{-- <div class="mb-3 user-photo-upload">
                        <h3 class="title">
                            Foto Profil
                        </h3>
                        <img id="avatar-src" src="{{ asset('assets/img/profile.webp') }}" class="me-3 avatar my-3"
                            style="object-fit: cover">
                        <div class="user-info">
                            <div class="upload">
                                <input type="file" name="avatar" id="avatar" class="file_upload avatar-image"
                                    accept="image/jpg, image/jpeg, image/png">
                                <div id="imageHelp" class="form-text mb-2">Format file jpg, jpeg, png. untuk ubah foto
                                </div>
                                <small class="form-text text-red text-muted d-none"></small>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                        <input name="name" value="{{ Auth::user()->nama }}" type="text" disabled=""
                            class="oh-disabled  form-control" id="exampleInputPassword1">
                        <small class="form-text text-muted d-none text-red"></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NPWP</label>
                        <input name="name" value="{{ preg_replace('/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})$/',
                        '$1.$2.$3.$4-$5.$6',
                        Auth::user()->npwp) }}" type="text" disabled="" class="oh-disabled  form-control"
                            id="exampleInputPassword1">
                        <small class="form-text text-muted d-none text-red"></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat Email</label>
                        <input name="email" value="{{ Auth::user()->email }}" type="email" disabled=""
                            class="oh-disabled  form-control" id="exampleInputPassword1">
                        <small id="emailHelp_2" class="form-text text-muted d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Role</label>
                        <input name="name" value="{{ Str::ucfirst(Auth::user()->role) }}" type="text" disabled=""
                            class="oh-disabled  form-control" id="exampleInputPassword1">
                        <small class="form-text text-muted d-none text-red"></small>
                    </div>
                    {{-- <button type="submit" class="w-100 mt-2 btn btn-primary btn-lg">Ubah Profil</button> --}}
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-12">
            <div class="basic-blue-card">
                <img src="https://class.buildwithangga.com/themes/front/images/ic_call_center.svg" class="mb-3">
                <h4 class="mt-3 mb-3 lh-base">
                    Anda Butuh <br> Bantuan Kami?
                </h4>
                <a href="https://wa.me/6285157626557" class="btn btn-secondary btn-daftar mt-3">
                    Hubungi Kami
                </a>
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
                Profil Saya
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

@push('scripts')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{!! route('bupot-pph21-final.index') !!}',
            "columns": [
                { data: 'action', name: 'action', className: 'text-nowrap text-center', width: '1%', orderable: false, searchable: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', width: '1%' , searchable: false, orderable: false},
                { data: 'masa_pajak', name: 'masa_pajak', className: 'text-nowrap text-center' },
                { data: 'tanggal_bukti_potong', name: 'tanggal_bukti_potong', className: 'text-nowrap text-center' },
                { data: 'no_bukti', name: 'no_bukti', className: 'text-center' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'tarif_pajak', name: 'tarif_pajak', className: 'text-center' },
                { data: 'penghasilan_bruto', name: 'penghasilan_bruto', className: 'text-end', render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { data: 'pph_dipotong', name: 'pph_dipotong', className: 'text-end', render: $.fn.dataTable.render.number('.', ',', 0, '') },
            ],
            "searching": true,
            "language": {
                "paginate": {
                    "previous": "‹",
                    "next": "›",
                }
            },
            "order": [
                [0, "desc"],
            ]
        });
    });
</script>
@endpush