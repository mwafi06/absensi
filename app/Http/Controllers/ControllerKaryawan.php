<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Jabatan;
// use DB;

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
        // $karyawans = DB::table('karyawans')
		// ->join('jabatan', 'jabatan.id', '=', 'karyawans.jabatan_id')
		// ->get();
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
        $request->validate([
            'nip'=>'required',
            'nama'=>'required'
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
    public function show($id)
    {
        //
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
        $request->validate([
            'nip'=>'required',
            'nama'=>'required'
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
        $karyawan->jabatan = $request->get('jabatan');
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
