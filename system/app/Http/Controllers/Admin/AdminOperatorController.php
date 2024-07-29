<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Operator;
use App\Models\Pegawai;

class AdminOperatorController extends Controller
{
    function index(){
        $data['bidang'] = Bidang::where('flag_erase',1)->get();
        $data['pegawai'] = Pegawai::where('flag_erase',1)->get();
        $data['operator'] = Pegawai::where('flag_erase',1)->where('pegawai_level',2)->get();
        return view('admin.operator.index',$data);
    }

    function store(){
       $pegawai = request('pegawai_id');
       $bidang = request('bidang_id');
       Pegawai::where('pegawai_id',$pegawai)->update([
        'pegawai_level' => 2,
        'pegawai_bidang' => $bidang,
       ]);
        return back()->with('success','Akun berhsail dibuat');
    }

    function destroy(Pegawai $pegawai){
      $pegawai->pegawai_level = 1;
      $pegawai->save();
      return back()->with('danger','Akun operator di non-aktifkan');
    }
}
