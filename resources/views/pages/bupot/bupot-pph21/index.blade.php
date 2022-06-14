@extends('layouts.app')

@section('desktop_content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-primary mb-3">
                Bukti Potong PPh 21 Bulanan
            </h1>
            <p class="subtitle-primary">
                Pajak Penghasilan Pasal 21 Tidak Final
            </p>
        </div>
    </div>
    <div class="row my-3">
        <div class="tabs-content-nd-secondary overflow-hidden">
            <ul class="nav nav-pills d-flex flex-wrap gap-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Daftar Pemotongan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab" id="pills-tools-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-tools" type="button" role="tab" aria-controls="pills-tools"
                        aria-selected="false">Tentang PPh
                        21</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fadeshow active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row mt-5 pricing testimonials mentors" id="reviews">
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
                                                {{-- <th></th> --}}
                                                <th class="text-center" scope="col">#</th>
                                                <th class="text-center">Masa Pajak</th>
                                                <th class="text-center">Tanggal</th>
                                                {{-- <th class="text-center">No. Bukti Potong</th> --}}
                                                {{-- <th class="text-center">Keterangan</th> --}}
                                                {{-- <th class="text-center">Tarif Pajak</th> --}}
                                                <th class="text-center">Penghasilan Bruto</th>
                                                <th class="text-center">PPh Dipotong</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" style="text-align:right">Total</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
                    <div class="row mt-5 pricing testimonials mentors" id="reviews">
                        <div class="col-lg-12 col-12">
                            <div class="p-3">
                                <h5>Pemotongan Pajak Penghasilan (PPh) Pasal 21</h5>
                                <p>Cara pelunasan
                                    pajak dalam tahun berjalan melalui pemotongan pajak atas penghasilan
                                    yang diterima atau diperoleh Wajib Pajak orang pribadi dalam negeri
                                    sehubungan dengan pekerjaan, jasa, dan kegiatan. Bendahara
                                    pemerintah yang membayar gaji, upah, tunjangan, honorarium, dan
                                    pembayaran lainnya dengan nama apapun sehubungan dengan
                                    pekerjaan/jasa/kegiatan wajib melakukan pemotongan PPh Pasal 21.
                                </p>
                                <p> Pengertian pembayaran gaji, upah, honorarium, tunjangan, dan
                                    pembayaran lainnya sehubungan dengan pekerjaan adalah pembayaran
                                    gaji, upah, honorarium, tunjangan, dan pembayaran sejenis lainnya
                                    dengan nama dan dalam bentuk apapun yang dilakukan oleh bendahara
                                    pemerintah kepada Pegawai Negeri Sipil (PNS), Pegawai honorer, anggota
                                    TNI atau POLRI, pejabat negara, atau Pegawai Tidak Tetap.</p>
                                <h5>Pengenaan PPh 21</h5>
                                <p>Secara umum, PPh Pasal 21 yang dipotong bendahara pemerintah
                                    bersifat tidak final. PPh Pasal 21 yang dipotong oleh bendahara
                                    pemerintah yang bersifat final hanya dikenakan atas penghasilan tidak
                                    tetap dan tidak teratur berupa honorarium atau imbalan tidak tetap
                                    dan tidak teratur lainnya, dengan nama dan dalam bentuk apapun yang
                                    menjadi beban APBN atau APBD dan dibayarkan kepada PNS (termasuk
                                    CPNS), anggota TNI atau POLRI, pejabat negara, dan pensiunannya.</p>
                            </div>

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
                url: '{!! route('bupot-pph21.index') !!}',
                data: function (d) {
                    d.bulan = $('select[name=bulan]').val();
                    d.tahun = $('select[name=tahun]').val();
                }
            },
            "columns": [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', width: '1%' , searchable: false, orderable: false},
                { data: 'masa_pajak', name: 'masa_pajak', className: 'text-nowrap text-center' },
                { data: 'tanggal_bukti_potong', name: 'tanggal_bukti_potong', className: 'text-nowrap text-center' },
                // { data: 'no_bukti', name: 'no_bukti', className: 'text-center' },
                // { data: 'keterangan', name: 'keterangan' },
                // { data: 'tarif_pajak', name: 'tarif_pajak', className: 'text-center' },
                { data: 'penghasilan_bruto', name: 'penghasilan_bruto', className: 'text-end', render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { data: 'pph_dipotong', name: 'pph_dipotong', className: 'text-end', render: $.fn.dataTable.render.number('.', ',', 0, '') },
            ],
            "searching": true,
            "language": {
                "search": "Pencarian :",
                "lengthMenu": "Tampilkan _MENU_ item",
                "info": "Menampilkan _START_ s.d. _END_ of _TOTAL_ item.",
                "infoEmpty": "",
                "loadingRecords": "Memuat...",
                "paginate": {
                    "previous": "‹",
                    "next": "›",
                },
                "emptyTable": "Tidak ada pemotongan PPh 21 Bulanan."
            },
            "order": [
                [0, "desc"],
            ],
            "pageLength": 100,
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();
                if(row) {
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };
                    pageTotal = api
                        .column(4, { page: 'current' })
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    $(api.column(4).footer()).html(pageTotal);
                }
            },
        });
        $('#search-form').on('submit', function(e) {
            tableDokumen.draw();
            e.preventDefault();
        });
    });
</script>
@endpush