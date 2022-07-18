<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IbuHamils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_hamils', function (Blueprint $table) {
            $table->increments('id_bumil');
            $table->string('nama_bumil');
            $table->string('nama_suami');
            $table->string('umur');
            $table->string('alamat');
            $table->string('bb_sebelum_hamil');
            $table->string('bb_sekarang');
            $table->string('tb_bumil');
            $table->string('hamil_ke');
            $table->string('usia_kehamilan');
            $table->string('penyakit_penyerta');
            $table->string('lila');
            $table->string('periksa_kehamilan');
            $table->string('umur_meninggal')->nullable();
            $table->string('tempat_meninggal')->nullable();
            $table->string('umur_melahirkan')->nullable();
            $table->string('tgl_melahirkan')->nullable();
            $table->string('bb_anak')->nullable();
            $table->string('tb_anak')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jenis_persalinan')->nullable();
            $table->string('tempat_persalinan')->nullable();
            $table->string('dokter')->nullable();
            $table->string('nama_anak')->nullable();
            $table->string('status')->nullable();
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
        //
    }
}
