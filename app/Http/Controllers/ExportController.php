<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Exports\UsersExport;
use Excel;

class ExportController extends Controller
{
     public function createExport()
    {
        return view('karyawan/detail');
    }

    public function exportFile()
    {
        if (!is_null(request()->bulan) && !is_null(request()->tahun)) {
            return Excel::download(new UsersExport, 'data.xlsx');        
        }else{
            return redirect('karyawan/detail')->with('alert','no data provide');
        }
    }
}
