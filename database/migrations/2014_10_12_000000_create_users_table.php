<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->bigInteger('id_agent')->nullable();
            $table->string('kode_agent')->unique()->nullable();
            $table->string('nama_lengkap', 100)->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('status_aktif')->default(1);

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
