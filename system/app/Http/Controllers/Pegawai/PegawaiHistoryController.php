<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Jadwal;
use Auth;

class PegawaiHistoryController extends Controller
{
    function index(){
        $auth = Auth::guard('pegawai')->user();
        $data['list_peserta'] = Peserta::where('peserta_pegawai_id', $auth->pegawai_id)
        ->where('status_notulensi',1)
        ->distinct()
        ->get();
        return view('pegawai.history.index',$data);
    }

    function show(Jadwal $jadwal){
        $data['detail'] = $jadwal;
        return view('pegawai.history.show',$data);
    }
}
