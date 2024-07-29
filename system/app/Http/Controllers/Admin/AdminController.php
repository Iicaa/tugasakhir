<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Peserta;
use App\Models\Jadwal;
use Auth;


class AdminController extends Controller
{
    function beranda(){
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $data['auth'] = $peserta = Auth::guard('pegawai')->user();
        $data['list_rapat'] = Peserta::where('status_notulensi',0)
        ->get();
        $jumlahUndangan = 0;
        $date = date('Y-m-d');
        $undangan = Jadwal::where('flag_erase', 1)
                    ->where('rapat_tanggal', '>=', $date) // Ubah menjadi '>=' untuk yang belum lewat
                    ->get();
                    foreach($undangan as $u){
                        $jumlahUndangan = Peserta::where('kode_rapat',$u->rapat_kode)->count();
                    }
                    $data['jumlahUndangan'] = $jumlahUndangan;

                    $data['mendatang'] = Peserta::where('status_notulensi',0)
                    ->count();

                    $data['total'] = Peserta::where('status_notulensi',1)
                    ->count();

                    $data['bulan'] = Peserta::where('status_notulensi', 1)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->whereYear('created_at', Carbon::now()->year)
                        ->count();
        return view('admin.beranda',$data);
    }
}
