<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    // iprotected $table = 'karyawan';

    protected $table = 'karyawans';
    protected $primaryKey= 'id';

    protected $fillable = [
        'nip',
        'nama',
        'tgl_lhr',
        'asal',
        'j_kel',
        'alamat',
        'no_tlp',
        'status',
        'jabatan_id'
    ];

    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }

    public function getAuthPassword()
    {
        return bcrypt($this->nip);
    }
}
