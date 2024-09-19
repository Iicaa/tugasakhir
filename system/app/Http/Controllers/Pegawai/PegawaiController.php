<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Peserta;  
use App\Models\Jadwal;  
use App\Models\Absensi;  
use App\Models\GenerateCode;  
use Carbon\Carbon;

class PegawaiController extends Controller
{
    function beranda(){
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $auth = Auth::guard('pegawai')->user();

        $data['mendatang'] = Jadwal::where('flag_erase',1)
        ->where('rapat_status',0)
        ->whereDate('rapat_tanggal', '>', date('Y-m-d'))
        ->where('rapat_bidang_id',$auth->pegawai_bidang)
        ->count();

        $data['total'] = Jadwal::where('flag_erase',1)
        ->where('rapat_bidang_id',$auth->pegawai_bidang)
        ->count();

        $data['bulan'] = Jadwal::where('flag_erase', 1)
        ->where('rapat_status',1)
        ->where('rapat_bidang_id',$auth->pegawai_bidang)
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();




        $data['auth'] = $peserta = Auth::guard('pegawai')->user();
        $data['list_rapat'] = Peserta::where('peserta_pegawai_id',$peserta->pegawai_id)
        ->where('status_notulensi',0)
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


                    return view('pegawai.beranda',$data);
                }

                function absensi(){
                    return view('pegawai.absensi');
                }

                function absensiKirim(Request $request,Jadwal $jadwal){
                    $rapatId = GenerateCode::where('code_generate',request('kode'))->first();

                    Peserta::where('peserta_jadwal_id',$rapatId->rapat_id)
                    ->where('peserta_pegawai_id',Auth::guard('pegawai')->user()->pegawai_id)
                    ->update([
                        'status_kehadiran' => 1
                    ]);

                    $url = 'x/jadwal-rapat/'.$rapatId->rapat_id.'/detail';
                    return redirect($url)->with('success','Absensi berhasil');
                }
            }
