<?php

namespace App\Exports;

use App\Karyawan;
use App\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         if (!is_null(request()->bulan) && !is_null(request()->tahun)) {
            $date   =array();

            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, request()->bulan, $d, request()->tahun);          
                if (date('m', $time)==request()->bulan)       
                    $date[] = date('Y-m-d', $time);
            }

            return Absensi::whereBetween('tgl',[$date[0],$date[count($date)-1]])
            ->leftJoin('karyawans','karyawans.id','=','absen.karyawan_id')
            ->select(DB::raw('karyawans.*,absen.id as absen_id,absen.abs_in,absen.abs_out,absen.karyawan_id,absen.keterangan,absen.status as absen_status'))
            ->where('karyawan_id',session()->get('karyawan_id'))
            ->get();
        }
    }
}
