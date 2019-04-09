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
         * get all post
         */
        $all_post = (object)$request->all();

        /*
         * define variable
         */
        $date_now = Carbon::now()->format('Y-m-d');
        $date_time_now = isset($all_post->time) ? $all_post->time : Carbon::now()->format('H:m:s');
        $callback = isset($all_post->callback) ? url($all_post->callback) : route('absen');

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
        $data_absensi = Absensi::where('karyawan_id',$data_karyawan->id)->where('tgl',$date_now)->first();

        /*
         * if absensi not exist
         */
        if (count($data_absensi) == 0) {

            /*
             * set data absen for insert to db
             */
            $absensi = new Absensi([
                'tgl' => $date_now,
                'abs_in' => $all_post->type == 'masuk' ? $date_time_now : null,
                'abs_out' => $all_post->type == 'keluar' ? $date_time_now : null,
                'karyawan_id' => $data_karyawan->id
            ]);

            $absensi->save();

            Session::flash('msg_success','Sukses, Have A Nice Day!');
            return redirect($callback);
        }else{

            /*
             * check data absensi
             */

            /*
             * if abs_in is not null and type masuk
             */
            if (!is_null($data_absensi->abs_in) && $all_post->type == 'masuk') {
                Session::flash('msg_error','Anda talah melakukan absen masuk hari ini');
                return redirect(route('absen')); 
            }

            /*
             * if abs_out is not null and type keluar
             */
            if (!is_null($data_absensi->abs_out) && $all_post->type == 'keluar') {
                Session::flash('msg_error','Anda talah melakukan absen keluar hari ini');
                return redirect(route('absen')); 
            }

            /*
             * set data absen for update to db
             */
            $absensi = Absensi::find($data_absensi->id);

            if ($all_post->type == 'masuk') {
                $absensi->abs_in = $date_time_now;
            }

            if ($all_post->type == 'keluar') {
                $absensi->abs_out = $date_time_now;
            }

            $absensi->save();

            Session::flash('msg_success','Sukses!');
            return redirect($callback);
        }
    }

    /*
     * function to show list absensi 
     */
    public function list()
    {
        $data['page'] = 'Absensi';
        $data['karyawan'] = Karyawan::all();
        return view('absensi/table',$data);
    }

    /*
     * function to show list absensi 
     */
    public function updateStatus(Request $request){
        /*
         * get all post
         */
        $all_post = (object)$request->all();

        /*
         * define variable
         */
        $date_now = Carbon::now()->format('Y-m-d');
        $callback = url('absensi');

        /*
         * get data absensi by date and kayawan id
         */
        $data_absensi = Absensi::where('karyawan_id',$all_post->hid_karyawan_id)->where('tgl',$date_now)->first();

        /*
         * if absensi not exist
         */
        if (count($data_absensi) == 0) {

            /*
             * set data absen for insert to db
             */
            $absensi = new Absensi([
                'tgl' => $date_now,
                'abs_in' => null,
                'abs_out' => null,
                'karyawan_id' => $all_post->hid_karyawan_id,
                'status' => $all_post->status,
                'keterangan' => $all_post->keterangan
            ]);

            $absensi->save();

            Session::flash('msg_success','Data berhasil di update!');
            return redirect($callback);
        }else{
            /*
             * set data absen for update to db
             */
            $absensi = Absensi::find($data_absensi->id);
            $absensi->status = $all_post->status;
            $absensi->keterangan = $all_post->keterangan;
            $absensi->save();

            Session::flash('msg_success','Data berhasil di update!');
            return redirect($callback);
        }
    }
}
