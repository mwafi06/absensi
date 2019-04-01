<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class ControllerKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        $data['page'] = 'Dashboard';
        $data['data_count'] = count($karyawan);

        return view('layouts.index',$data);
    }
    
    public function form()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.form', compact('karyawan'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'jabatan' => $request->get('jabatan')
        ]);
        $karyawan->save();
        return redirect('/karyawan/form')->with('Success', 'Data Telah Tersimpan!');
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
        return view('/karyawan/edit', compact('karyawan'));
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

        return redirect('/karyawan/form')->with('Success', 'Data Telah Di Update!');
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

        return redirect('/karyawan/form')->with('Success', 'Data Telah Di Hapus!');
    }
}