<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Peserta;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\GenerateCode;
use App\Models\RapatDokumentasi;
use App\Models\Notulensi;
use Auth;
use DB;
use Str;
use App\Mail\SendMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class PegawaiRapatController extends Controller
{
    function index(){
        $data['auth'] = $peserta = Auth::guard('pegawai')->user();
        $undangan = $data['list_jadwal'] =  Peserta::where('peserta_pegawai_id',$peserta->pegawai_id)
        ->where('status_notulensi',1)
        ->get();
        $jumlahUndangan = 0;
        foreach($undangan as $u){
            $jumlahUndangan = Peserta::where('kode_rapat',$u->rapat_kode)->count();
        }
        $data['jumlahUndangan'] = $jumlahUndangan;
        return view('pegawai.jadwal-rapat.index',$data);
    }

    function create(){
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)->get();
        $data['list_bidang'] = Bidang::all();
        return view('pegawai.jadwal-rapat.create',$data);
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
        $jadwal->rapat_bidang_id= Auth::guard('pegawai')->user()->pegawai_bidang;
        $jadwal->handleUploadFile();
        $jadwal->save();

        

        $code = new GenerateCode;
        $code->rapat_id = $jadwal->jadwal_id;
        $code->code_generate = mt_rand(000001,999999);
        $code->save();

        $url = 'x/jadwal-rapat/'.$jadwal->jadwal_id.'/pilih-pegawai';
        return redirect($url)->with('success','Jadwal rapat berhasil dibuat');
        

    }

    function pilihPegawai(Jadwal $jadwal){
        $data['detail'] = $jadwal;
        $list_pegawai = $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_nama','!=','')
        ->orderBy('pegawai_nama','ASC')
        ->get();
        return view('pegawai.jadwal-rapat.pilih-pegawai',$data);
    }

    function kirimJadwal(Request $request,Jadwal $jadwal){

        $pegawai_ids = $request->input('pegawai_id', []);
        $pegawai_emails = [];
        
        foreach ($pegawai_ids as $pegawai_id) {
            if ($request->has('pegawai_check_' . $pegawai_id)) {
                $pegawai = Pegawai::find($pegawai_id); 
                if ($pegawai) {
                    $pegawai_emails[] = $pegawai->email;
                    $data = [
                        'peserta_pegawai_id' => $pegawai->pegawai_id, 
                        'peserta_email' => $pegawai->email, 
                        'kode_rapat' => $jadwal->rapat_kode,
                        'pegawai_nama' => $pegawai->pegawai_nama,
                        'peserta_jadwal_id' => $jadwal->jadwal_id,
                        'created_at' => Carbon::now(),
                    ];

                    DB::table('peserta')->insert($data);
                }
            }
        }
        
        // return response()->json(['pegawai_emails' => $pegawai_emails]);
        $data = [
            'judulRapat' => $jadwal->rapat_judul,
            'mulai' => $jadwal->rapat_waktu_mulai,
            'selesai' => $jadwal->rapat_waktu_selesai,
            'ruangan' => $jadwal->rapat_ruangan,
            'tanggal' => $jadwal->rapat_tanggal,
        ];
        Mail::to($pegawai_emails)->send(new SendMail($data));
        $url = 'x/jadwal-rapat/'.$jadwal->jadwal_id.'/detail';
        return redirect($url)->with('success','Undangan berhasil dikirim ke email');
    }

    function show(Jadwal $jadwal){
        $data['detail'] = $jadwal;

        $data['notulensi'] = Notulensi::where('jadwal_id',$jadwal->jadwal_id)->first();


        $data['list_undangan'] = Peserta::where('peserta_jadwal_id',$jadwal->jadwal_id)->get();
        $data['countPeserta'] = Peserta::where('peserta_jadwal_id',$jadwal->jadwal_id)->count();
        $data['list_dokumentasi'] = RapatDokumentasi::where('jadwal_id',$jadwal->jadwal_id)->get();

        $data['codeGenerate'] = GenerateCode::where('rapat_id',$jadwal->jadwal_id)->first()->code_generate;
        return view('pegawai.jadwal-rapat.show',$data);
    }

    function genereteCode(Jadwal $jadwal){

        $newCode = mt_rand(000001,999999);
        DB::table('code_generate')->where('rapat_id',$jadwal->jadwal_id)->update([
            'code_generate' => $newCode
        ]);
        return $newCode;
    }

    function undangLagi(Jadwal $jadwal){
        $peserta_emails = Peserta::where('peserta_jadwal_id', $jadwal->jadwal_id)
        ->pluck('peserta_email')
        ->toArray();

        $data = [
            'judulRapat' => $jadwal->rapat_judul,
            'mulai' => $jadwal->rapat_waktu_mulai,
            'selesai' => $jadwal->rapat_waktu_selesai,
            'ruangan' => $jadwal->rapat_ruangan,
            'tanggal' => $jadwal->rapat_tanggal,
        ];
        
        Mail::to($peserta_emails)->send(new SendMail($data)); 
        return back()->with('success','Undangan dikirim kembali');
    }

    function notulensi(Jadwal $jadwal){
        $data['detail'] = $jadwal;
        $data['notulensi'] = Notulensi::where('jadwal_id',$jadwal->jadwal_id)->first();
        $data['list_file'] = RapatDokumentasi::where('jadwal_id',$jadwal->jadwal_id)->get();
        $data['count'] = Notulensi::where('jadwal_id',$jadwal->jadwal_id)->count();
        return view('pegawai.jadwal-rapat.notulensi',$data);
    }

    function storeNotulensi(Request $request, Jadwal $jadwal){

      

        Peserta::where('peserta_jadwal_id',$jadwal->jadwal_id)->update([
            'status_notulensi' => 1
        ]);
        $jadwal->rapat_status = 1;
        $note = new Notulensi;
        $note->jadwal_id = $jadwal->jadwal_id;
        $note->notulensi_isi = request('notulensi_isi');
        $note->save();
        $jadwal->save();

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $key => $file) {
                $rand = Str::random(5) . '-' . Str::random(5);
                $nama_file = 'dokumentasi' . '-' . $rand . '-' . time() . '.' . $file->getClientOriginalExtension();
                $store = $file->storeAs('dokumentasi', $nama_file);

                $bukti = new RapatDokumentasi;
                $bukti->jadwal_id = $jadwal->jadwal_id;
                $bukti->file = $store;
                $bukti->nama_file = $request->input('nama_file')[$key]; 
                $bukti->save();
            }
        }
        $url = 'x/jadwal-rapat/'.$jadwal->jadwal_id.'/detail';
        return redirect($url)->with('success','Berhasil buat notulensi');


    }

    function updateNotulensi(Request $request, Jadwal $jadwal){
        Notulensi::where('jadwal_id',$jadwal->jadwal_id)->update([
            'notulensi_isi' => request('notulensi_isi')
        ]);
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $key => $file) {
                $rand = Str::random(5) . '-' . Str::random(5);
                $nama_file = 'dokumentasi' . '-' . $rand . '-' . time() . '.' . $file->getClientOriginalExtension();
                $store = $file->storeAs('dokumentasi', $nama_file);

                $bukti = new RapatDokumentasi;
                $bukti->jadwal_id = $jadwal->jadwal_id;
                $bukti->file = $store;
                $bukti->nama_file = $request->input('nama_file')[$key]; 
                $bukti->save();
            }
        }
        $url = 'x/jadwal-rapat/'.$jadwal->jadwal_id.'/detail';
        return redirect($url)->with('success','Berhasil buat notulensi');
    }

    function destroyFile(RapatDokumentasi $dokumentasi){
        $dokumentasi->delete();
        return back()->with('success','Berkas Dihapus');
    }

    function tambahUndangan(Jadwal $jadwal){
        $peserta = new Peserta;
        $peserta->peserta_email = request('peserta_email');
        $peserta->pegawai_nama = request('pegawai_nama');
        $peserta->kode_rapat = $jadwal->rapat_kode;
        $peserta->peserta_jadwal_id = $jadwal->jadwal_id;
        $peserta->save();

        $email = request('peserta_email');

        $data = [
            'judulRapat' => $jadwal->rapat_judul,
            'mulai' => $jadwal->rapat_waktu_mulai,
            'selesai' => $jadwal->rapat_waktu_selesai,
            'ruangan' => $jadwal->rapat_ruangan,
            'tanggal' => $jadwal->rapat_tanggal,
        ];
        
        Mail::to($email)->send(new SendMail($data)); 

        return back()->with('success','Berhasil diundang');
    }

    function absensi(Jadwal $jadwal,Peserta $peserta){
        $peserta->status_kehadiran = request('status_kehadiran');
        $peserta->save();
        return back();
    }
}
