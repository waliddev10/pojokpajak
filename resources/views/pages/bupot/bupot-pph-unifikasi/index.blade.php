@extends('layouts.app')

@section('desktop_content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-primary mb-3">
                Bukti Potong PPh Unifikasi
            </h1>
            <p class="subtitle-primary">
                Pajak Penghasilan Pasal 4 ayat (2), 15, 22, 23
            </p>
        </div>
    </div>
    <div class="row basic-form mt-4">
        <div class="col-lg-12 col-12">
            <div class="default-card">
                <div class="row mb-3">
                    <div class="col-12">
                        <form id="search-form" class="row g-2 align-items-center">
                            <div class="col-auto">
                                <select name="bulan" class="form-control">
                                    <option disabled="">Pilih Bulan...</option>
                                    <option selected="" value="Semua">Semua Bulan</option>
                                    <option value="01">Januari
                                    </option>
                                    <option value="02">Februari
                                    </option>
                                    <option value="03">Maret
                                    </option>
                                    <option value="04">April
                                    </option>
                                    <option value="05">Mei
                                    </option>
                                    <option value="06">Juni
                                    </option>
                                    <option value="07">Juli
                                    </option>
                                    <option value="08">Agustus
                                    </option>
                                    <option value="09">September
                                    </option>
                                    <option value="10">Oktober
                                    </option>
                                    <option value="11">November
                                    </option>
                                    <option value="12">Desember
                                    </option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <select name="tahun" class="form-control">
                                    <option disabled="">Pilih Tahun...</option>
                                    <option value="2022" selected="">2022
                                    </option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-filter fa-fw"></i>
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive pb-3">
                    <table class="table datatables w-100 table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center">Masa Pajak</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">No. Bukti Potong</th>
                                <th class="text-center">Pasal</th>
                                <th class="text-center">Penghasilan Bruto</th>
                                <th class="text-center">Pajak Dipotong</th>
                            </tr>
                        </thead>
                        <tbody>
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
                Bupot PPh 21 Final
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
       tableDokumen = $('.datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: '{!! route('bupot-pph21-final.index') !!}',
                data: function (d) {
                    d.bulan = $('select[name=bulan]').val();
                    d.tahun = $('select[name=tahun]').val();
                }
            },
            "columns": [
                { data: 'action', name: 'action', className: 'text-nowrap text-center', width: '1%', orderable: false, searchable: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', width: '1%' , searchable: false, orderable: false},
                { data: 'masa_pajak', name: 'masa_pajak', className: 'text-nowrap text-center' },
                { data: 'tanggal_bukti_potong', name: 'tanggal_bukti_potong', className: 'text-nowrap text-center' },
                { data: 'no_bukti', name: 'no_bukti', className: 'text-center' },
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
        $('#search-form').on('submit', function(e) {
            tableDokumen.draw();
            e.preventDefault();
        });
    });
</script>
@endpush