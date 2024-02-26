<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id_agent');
            $table->string('kode_agent')->unique()->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->float('total_ujrah')->nullable();
            $table->string('nama_lengkap', 100)->nullable();
            $table->string('email')->unique()->nullable();
            $table->float('no_ktp')->nullable();
            $table->float('no_telepon')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->float('usia')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->timestamp('added_at')->nullable();
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
        Schema::dropIfExists('agents');
    }
}
