<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pegawai;
use App\Models\Peserta;
use App\Models\GenerateCode;
use App\Models\Notulensi;
use App\Models\RapatDokumentasi;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use DB;

class AdminJadwalRapatController extends Controller
{
    function index(){
        $undangan = $data['list_jadwal'] = Jadwal::where('flag_erase',1)->get();
        $jumlahUndangan = 0;
            foreach($undangan as $u){
                $jumlahUndangan = Peserta::where('kode_rapat',$u->rapat_kode)->count();
            }
         $data['jumlahUndangan'] = $jumlahUndangan;
    	return view('admin.jadwal-rapat.index',$data);
    }

    function create(){
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)->get();
    	return view('admin.jadwal-rapat.create',$data);
    }

    function store(){
        $jadwal = new Jadwal;
        $jadwal->rapat_kode =  mt_rand(000001,999999);
        $jadwal->rapat_judul = request('rapat_judul');
        $jadwal->rapat_ruangan = request('rapat_ruangan');
        $jadwal->rapat_waktu_mulai = request('rapat_waktu_mulai');
        $jadwal->rapat_waktu_selesai = request('rapat_waktu_selesai');
        $jadwal->rapat_tanggal = request('rapat_tanggal');
        $jadwal->rapat_pimpinan_id = request('rapat_pimpinan_id');
        $jadwal->rapat_notulen_id = request('rapat_notulen_id');
        $jadwal->rapat_deskripsi = request('rapat_deskripsi');
        // $jadwal->handleUploadFile();
        $jadwal->save();

        $code = new GenerateCode;
        $code->rapat_id = $jadwal->jadwal_id;
        $code->code_generate = mt_rand(000001,999999);
        $code->save();

        $url = 'admin/jadwal-rapat/'.$jadwal->jadwal_id.'/pilih-pegawai';
        return redirect($url)->with('success','Jadwal rapat berhasil dibuat');
        

    }

    function pilihPegawai(Jadwal $jadwal){
        $data['detail'] = $jadwal;
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_nama','!=','')
        ->orderBy('pegawai_nama','ASC')
        ->get();
        
 
        Mail::to($users)->send(new SendMail());

        return view('admin.jadwal-rapat.pilih-pegawai',$data);
    }

    function kirimJadwal(Request $request,Jadwal $jadwal){

       
    $pegawai_ids = $request->input('pegawai_id', []);
    $pegawai_emails = [];
    
    foreach ($pegawai_ids as $pegawai_id) {
        if ($request->has('pegawai_check_' . $pegawai_id)) {
            $pegawai = Pegawai::find($pegawai_id); 
            if ($pegawai) {
                $pegawai_emails[] = $pegawai->email;
                
                // Cek apakah sudah ada data peserta dengan pegawai_id dan jadwal_id yang sama
                $existingPeserta = DB::table('peserta')
                                    ->where('peserta_pegawai_id', $pegawai->pegawai_id)
                                    ->where('peserta_jadwal_id', $jadwal->jadwal_id)
                                    ->first();
                
                if (!$existingPeserta) {
                    // Jika belum ada, simpan data baru
                    $data = [
                        'peserta_pegawai_id' => $pegawai->pegawai_id, 
                        'peserta_email' => $pegawai->email, 
                        'kode_rapat' => $jadwal->rapat_kode,
                        'peserta_jadwal_id' => $jadwal->jadwal_id,
                    ];

                    DB::table('peserta')->insert($data);
                } else {
                   
                    DB::table('peserta')
                        ->where('peserta_pegawai_id', $pegawai->pegawai_id)
                        ->where('peserta_jadwal_id', $jadwal->jadwal_id)
                        ->update([
                            'peserta_email' => $pegawai->email,
                            'updated_at' => date::now(),
                        ]);
                }
            }
        }
    }

    Mail::to($pegawai_emails)->send(new SendMail());
    return back();
    }

    function show(Jadwal $jadwal){
        $data['detail'] = $jadwal;

        $data['notulensi'] = Notulensi::where('jadwal_id',$jadwal->jadwal_id)->first();


        $data['list_undangan'] = Peserta::where('peserta_jadwal_id',$jadwal->jadwal_id)->get();
        $data['countPeserta'] = Peserta::where('peserta_jadwal_id',$jadwal->jadwal_id)->count();
        $data['list_dokumentasi'] = RapatDokumentasi::where('jadwal_id',$jadwal->jadwal_id)->get();

        $data['codeGenerate'] = GenerateCode::where('rapat_id',$jadwal->jadwal_id)->first()->code_generate;
        return view('admin.jadwal-rapat.show',$data);
    }

    function genereteCode(Jadwal $jadwal){

        $newCode = mt_rand(000001,999999);
        DB::table('code_generate')->where('rapat_id',1)->update([
            'code_generate' => $newCode
        ]);
        return $newCode;
    }


}
