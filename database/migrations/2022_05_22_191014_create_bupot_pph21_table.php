<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBupotPph21Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bupot_pph21', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('no_bukti')->nullable();
            $table->date('tanggal_bukti_potong');
            $table->string('npwp_pemotong')->nullable();
            $table->string('nama_pemotong')->nullable();
            $table->string('idsubunit_pemotong')->nullable();
            $table->string('identitas_penerima_penghasilan');
            $table->string('nama_penerima_penghasilan');
            $table->string('penghasilan_bruto');
            $table->string('pph_dipotong');
            $table->string('kode_objek_pajak');
            $table->string('pasal');
            $table->string('masa_pajak');
            $table->string('tahun_pajak');
            $table->string('status');
            $table->string('rev_no');
            $table->string('posting');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bupot_pph21');
    }
}
