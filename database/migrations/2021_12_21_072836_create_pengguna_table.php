<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->text('alamat');
            $table->string('jenis_kelamin', 20);
            $table->char('no_telpon', 20);
            $table->string('email', 40);
            $table->string('username', 20);
            $table->string('password', 100);
            $table->char('minat_membaca', 10);
            $table->string('token', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
