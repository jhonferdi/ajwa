<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaahs', function (Blueprint $table) {
            $table->bigIncrements('id_jemaah');
            $table->bigInteger('id_user')->nullable();
            // id agent
            $table->string('kode_agent')->nullable();
            $table->string('email_jemaah')->nullable();
            $table->string('nama_lengkap_jemaah', 100)->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->float('usia_jemaah')->nullable();
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN'])->nullable();
            $table->string('alamat_jemaah')->nullable();
            $table->string('ahli_waris')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_telepon_keluarga')->nullable();
            $table->string('nama_pendamping')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_kakek')->nullable();
            $table->bigInteger('paket_umroh')->nullable();
            $table->date('tanggal_pendaftaran')->nullable();
            $table->date('tanggal_keberangkatan')->nullable();
            $table->string('informasi_via')->nullable();
            $table->string('jenis_kamar')->nullable();
            $table->string('kursi_roda')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->bigInteger('dp_pembayaran')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->string('pas_foto_jemaah')->nullable();
            $table->string('ktp_jemaah')->nullable();
            $table->string('kk_jemaah')->nullable();
            $table->string('pasport_asli')->nullable();
            $table->string('bukti_vaksin_maningitis')->nullable();
            $table->string('media_sosial')->nullable();

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
        Schema::dropIfExists('jemaahs');
    }
}
