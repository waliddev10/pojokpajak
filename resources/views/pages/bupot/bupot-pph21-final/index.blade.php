@extends('layouts.app')

@section('title', 'Bukti Potong PPh 21 Final')

@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bukti Potong PPh 21 Final</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="masa_pajak_id">Masa Pajak</label>
            <select id="masa_pajak_id" name="masa_pajak_id" class="form-control">
                <option value="semua">Semua</option>
                @php
                $bulan = 1;
                @endphp
                @while ($bulan <= 12) <option value="{{ str_pad($bulan, 2, '0', STR_PAD_LEFT) }}" @if (str_pad($bulan,
                    2, '0' , STR_PAD_LEFT)==date('m') - 1) selected @endif>{{ str_pad($bulan, 2, '0', STR_PAD_LEFT) .
                    ' - '
                    .
                    \Carbon\Carbon::create()->month($bulan)->monthName}}</option>
                    @php
                    $bulan++;
                    @endphp
                    @endwhile
            </select>
        </div>
        <div class="table-responsive mt-4">
            <table id="bupot-pph21-finalTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>No. Bukti Potong</th>
                        <th>Tanggal Bukti Potong</th>
                        <th>Masa Pajak</th>
                        <th>Keterangan</th>
                        <th>Kode Objek Pajak</th>
                        <th>Penghasilan Bruto</th>
                        <th>PPh Dipotong</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalContainer" data-backdrop="static" data-keyboard="false" role="dialog"
    aria-labelledby="modalContainer" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Title</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white p-0">
                ...
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ajaxError(function(event, xhr, settings, thrownError) {
            if (xhr.status == 422) {
                message = '';
                type = 'warning';

                $('.form.needs-validation').find('input, select, textarea').removeClass('is-invalid');
                $('.form.needs-validation').find('.select2').removeClass('border border-danger');
                $('.invalid-feedback').remove();
                $.each(xhr.responseJSON.errors, function(name, message) {
                    $('[name="' + name + '"]').addClass('is-invalid').after('<div class="invalid-feedback">' + message  + '</div>');
                    $('.select2[name="' + name + '"]').next('.select2').addClass(
                        'border border-danger').after('<div class="invalid-feedback">' + message  + '</div>');
                });
            } else if (xhr.status == 401 || xhr.status == 419) {
                message = 'Sesi login habis, silakan muat ulang browser Anda dan login kembali.';
                type = 'warning';
                $('.modal').modal('hide');
                showAlert(message, type);
            } else if (xhr.status == 500) {
                message = 'Terjadi kesalahan, silakan muat ulang browser Anda dan hubungi Admin.';
                type = 'danger';
                $('.modal').modal('hide');
                showAlert(message, type);
            }
        });
    });
</script>
@endpush

@push('scripts')
<script type="text/javascript">
    tableDokumen = $('#bupot-pph21-finalTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('bupot-pph21-final.index') !!}',
        columns: [
            { data: 'action', name: 'action', className: 'text-nowrap text-center', width: '1%', orderable: false, searchable: false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', width: '1%' , searchable: false, orderable: false},
            { data: 'no_bukti', name: 'no_bukti', className: 'text-center' },
            { data: 'tanggal_bukti_potong', name: 'tanggal_bukti_potong', className: 'text-center' },
            { data: 'masa_pajak', name: 'masa_pajak', className: 'text-center' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'kode_objek_pajak', name: 'kode_objek_pajak', className: 'text-center' },
            { data: 'penghasilan_bruto', name: 'penghasilan_bruto' },
            { data: 'pph_dipotong', name: 'pph_dipotong' },
        ],
        order: [[2, 'asc']]
    });

    // Global Settings DataTables Search
    $(document).on('init.dt', function (e, settings) {
        var api = new $.fn.dataTable.Api(settings);
        var inputs = $(settings.nTable).closest('.dataTables_wrapper').find('.dataTables_filter input');

        inputs.unbind();
        inputs.each(function (e) {
            var input = this;

            function disableSubmitOnEnter(form) {
                if (form.length) {
                    form.on('keyup keypress', function (e) {
                        var keyCode = e.keyCode || e.which;

                        if (keyCode == 13) {
                            e.preventDefault();
                            return false;
                        }
                    });
                }
            }
            disableSubmitOnEnter($(input).closest('form'));

            $(input).bind('keyup', function (e) {
                if (e.keyCode == 13) {
                    api.search(this.value).draw();
                }
            });

            $(input).bind('input', function (e) {
                if (this.value == '') {
                    api.search(this.value).draw();
                }
            });
        });
    });

    function setLoader() {
        return '<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"></div></div>';
    }

    $('#modalContainer').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title')
        var href = button.attr('href')
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html(setLoader())
        $.get(href).done(function( data ) {
            modal.find('.modal-body').html(data)
        });
    });

    function showAlert(message, type = 'success', reload = false) {
        if (type == 'success') {
            Swal.fire({
                icon: 'success',
                title: message,
                allowEscapeKey: false,
                allowOutsideClick: false,
                allowEnterKey: false
            })
        } else {
            if (type == 'danger') {
                type = 'error';
            }

            Swal.fire({
                title: type.toUpperCase()+'!',
                html: message,
                icon: type
            }).then((result) => {
                if (result.isConfirmed) {
                    if (reload) {
                        window.location.reload();
                    }
                }
            });
        }
    }
</script>
@endpush