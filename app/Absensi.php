<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
	protected $table = 'absen';

	protected $fillable = [
		'tgl',
		'abs_in',
		'abs_out',
		'status',
		'keterangan',
		'karyawan_id'
	];
}
