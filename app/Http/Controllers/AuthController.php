<?php

namespace App\Http\Controllers;

use\App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


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

        // $email = $request->email;
        // $password = $request->password;

        // $data = User::where('email',$email)->first();
        // if($data){ //apakah email tersebut ada atau tidak
        //     if(Hash::check($password,$data->password)){
        //         Session::put('name',$data->name);
        //         Session::put('email',$data->email);
        //         Session::put('login',TRUE);
        //         return redirect('index');
        //     }
        //     else{
        //         return redirect('/auths/login')->with('alert','Password atau Email, Salah !');
        //     }
        // }
        // else{
        //     return redirect('/auths/login')->with('alert','Password atau Email, Salah!');
        // }
        $email = $request->email;
        $data = User::where('email',$email)->first();
        if(Auth::attempt($request->only('email', 'password')))
        {
            Session::put('name',$data->name);
            return redirect('index');
        }
        return redirect('/auths/login');
    }

    public function logout()
    {
        // Auth::logout();
        Session::flush();
        return redirect('/auths/login')->with('alert','Logout Berhasil!');
    }

    public function register(Request $request){
        return view('auths.register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            // 'confirmation' => 'required|same:password',
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('/auths/login')->with('alert-success','Kamu berhasil Register!');
    }
}