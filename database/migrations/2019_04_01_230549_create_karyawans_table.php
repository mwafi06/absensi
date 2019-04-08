<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip');
            $table->string('nama');
            $table->string('tgl_lhr', 45);
            $table->string('asal', 30);
            $table->string('j_kel', 45);
            $table->longText('alamat');
            $table->string('no_tlp', 45);
            $table->string('status', 45)->nullable();
            $table->integer('jabatan');
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
        Schema::dropIfExists('karyawans');
    }
}
