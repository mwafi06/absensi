<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    // iprotected $table = 'karyawan';
    protected $fillable = [
    'nip',
    'nama',
    'tgl_lhr',
    'asal',
    'j_kel',
    'alamat',
    'no_tlp',
    'status',
    'jabatan'
  ];
}
