<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropColumn(['nip','name']);
            $table->integer('karyawan_id')->after('abs_out');
            $table->enum('status',['masuk','izin','alpa'])->default('masuk')->after('karyawan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropColumn(['status','karyawan_id']);
            $table->integer('nip')->after('abs_out');
            $table->string('name')->after('nip');
        });
    }
}
