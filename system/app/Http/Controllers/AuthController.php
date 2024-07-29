<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    function root(){
        return view('index');
    }
    function login(){
        return view('login')->with('success','Masuk dahulu');
    }

    function loginProses(Request $request){
       $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
        return redirect('admin/beranda')->with('success','Selamat datang kembali'); 
       
        }elseif(Auth::guard('pegawai')->attempt($credentials)){
            return redirect()->intended('x/beranda')->with('success','Selamat datang kembali'); 
        }else{
            return back()->with('warning','Login Gagal, Periksa email atau password anda !!');
        }
}

function logout(){
    Auth::logout();
    Auth::guard('pegawai')->logout();
    return redirect('login')->with('success','Berhasil keluar');
}
}
