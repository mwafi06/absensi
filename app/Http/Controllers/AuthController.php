<?php

namespace App\Http\Controllers;

use\App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Karyawan;


class AuthController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('/auths/login')->with('alert','Kamu harus login dulu!');
        }
        else{
            return view('index');
        }
    }

    public function login(){
        return view('/auths/login');
    }

    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email',$email)->first();
        if(Auth::attempt($request->only('email', 'password')))
        {
            Session::put('name',$data->name);
            return redirect('index');
        }else{

            if ($email!= $password) {
                return redirect('/auths/login')->with('alert','Data karyawan tidak valid');
            }

            if (Auth::guard('karyawan')->attempt(['nip' => $email,'password' => $email])) {

                $data_karyawan = Karyawan::Where('nip',$email)->first();
                Session::put('name',$data_karyawan->nama);
                Session::put('karyawan_id',$data_karyawan->id);
                return redirect('karyawan/detail');            
            } else {
                return redirect('/auths/login')->with('alert','Invalid login');
            }
        }
    }

    public function logout()
    {
        // Auth::logout();
        Session::flush();
        return redirect('/auths/login')->with('alert','Logout Berhasil!');
    }
}