<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BupotPph21 extends Model
{

    protected $table = 'bupot_pph21';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_bukti',
        'tanggal_bukti_potong',
        'npwp_pemotong',
        'nama_pemotong',
        'idsubunit_pemotong',
        'identitas_penerima_penghasilan',
        'nama_penerima_penghasilan',
        'penghasilan_bruto',
        'pph_dipotong',
        'kode_objek_pajak',
        'pasal',
        'masa_pajak',
        'tahun_pajak',
        'status',
        'rev_no',
        'posting',
        'keterangan',
    ];
}
