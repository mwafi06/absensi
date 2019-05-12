<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Karyawan;
use App\Jabatan;
use App\Absensi;

class ControllerKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['karyawan'] = Karyawan::all();
        $data['page'] = 'Form';
        return view('karyawan.form', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::pluck('nama_jabatan', 'id');
        return view('karyawan.create', compact('id', 'jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip'=>'required',
            'nama'=>'required',
            'tgl_lhr'=>'required',
            'asal'=>'required',
            'j_kel'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required',
            'status'=>'required',
            'jabatan_id'=>'required'
        ]);

        $karyawan = new Karyawan([
            'nip' => $request->get('nip'),
            'nama' => $request->get('nama'),
            'tgl_lhr' => $request->get('tgl_lhr'),
            'asal' => $request->get('asal'),
            'j_kel' => $request->get('j_kel'),
            'alamat' => $request->get('alamat'),
            'no_tlp' => $request->get('no_tlp'),
            'status' => $request->get('status'),
            'jabatan_id' => $request->get('jabatan_id')
        ]);
        $karyawan->save();
        // $post->jabatan()->sync($request->get('jabatan_id'));
        return redirect('/karyawan')->with('Success', 'Data Telah Tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data['page'] = 'Detail karyawan';
        $data_absensi = array();

        if ((!is_null($request->bulan) && $request->bulan != 'Bulan') && (!is_null($request->tahun) && $request->tahun != 'Tahun')) {
            $date   =array();

            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, $request->bulan, $d, $request->tahun);          
                if (date('m', $time)==$request->bulan)       
                    $date[] = date('Y-m-d', $time);
            }

            $data_absensi = Absensi::whereBetween('tgl',[$date[0],$date[count($date)-1]])
            ->leftJoin('karyawans','karyawans.id','=','absen.karyawan_id')
            ->select(DB::raw('karyawans.*,absen.id as absen_id,absen.abs_in,absen.abs_out,absen.karyawan_id,absen.keterangan,absen.status as absen_status, absen.tgl as absen_tgl'))
            ->where('karyawan_id',session()->get('karyawan_id'))
            ->get();
        }

        $data['data_absensi'] = $data_absensi;
        return view('/karyawan/detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $jabatans = Jabatan::get();
        return view('/karyawan/edit', compact('karyawan','jabatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nip'=>'required',
            'nama'=>'required',
            'tgl_lhr'=>'required',
            'asal'=>'required',
            'j_kel'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required',
            'status'=>'required',
            'jabatan_id'=>'required'
        ]);

        $karyawan = Karyawan::find($id);
        $karyawan->nip = $request->get('nip');
        $karyawan->nama = $request->get('nama');
        $karyawan->tgl_lhr = $request->get('tgl_lhr');
        $karyawan->asal = $request->get('asal');
        $karyawan->j_kel = $request->get('j_kel');
        $karyawan->alamat = $request->get('alamat');
        $karyawan->no_tlp = $request->get('no_tlp');
        $karyawan->status = $request->get('status');
        $karyawan->jabatan_id = $request->get('jabatan_id');
        $karyawan->save();

        return redirect('/karyawan')->with('Success', 'Data Telah Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect('/karyawan')->with('Success', 'Data Telah Di Hapus!');
    }
}
