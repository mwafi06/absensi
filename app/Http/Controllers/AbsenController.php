<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Absensi;
use App\Karyawan;

class AbsenController extends Controller
{
	/*
	 * function to show absen page
	 */
	public function index()
	{
		return view('absensi/absen');
	}

    /*
	 * function to save/add absen
	 */
    public function save(Request $request)
    {
    	/*
    	 * define variable
    	 */
    	$date_now = Carbon::now()->format('Y-m-d');
    	$date_time_now = Carbon::now()->format('H:m:s');

    	/*
    	 * get all post
    	 */
    	$all_post = (object)$request->all();

    	/*
    	 * get karyawan data by nip or name
    	 */
    	$data_karyawan = Karyawan::where('nama',$all_post->name)->orWhere('nip',$all_post->name)->first();

    	/*
    	 * if karyawan not exist
    	 */
    	if (count($data_karyawan) == 0) {
    		Session::flash('msg_error','User tidak terdaftar');
    		return redirect(route('absen'));
    	}

    	/*
    	 * get data absensi by date and kayawan id
    	 */
    	$data_absensi = Karyawan::where('nama',$all_post->name)->orWhere('nip',$all_post->name)->first();


    }
}
