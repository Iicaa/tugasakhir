<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pegawai;

class PegawaiProfilController extends Controller
{
    function index(){
        return view('pegawai.profil.index');
    }

    function update(){
        $auth = Auth::guard('pegawai')->user();
        $new = request('new');
        $konfirmasi = request('konfirmasi');

        if($new == $konfirmasi){
            Pegawai::where('pegawai_id',$auth->pegawai_id)->update([
                'password' => bcrypt($new)
            ]);
            return back()->with('success','Password berhasil diganti');
        }else{
             return back()->with('warning','Password tidak sama');
        }
    }
}
