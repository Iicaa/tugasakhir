<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use Illuminate\Contracts\Pagination\Paginator;


class AdminPegawaiController extends Controller
{
    function index(){
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_nama','!=','')
        ->orderBy('pegawai_nama','ASC')
        ->paginate(15);
        return view('admin.pegawai.index',$data);
    }


    function create(){
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.pegawai.create',$data);
    }

    function store(){
        $pegawai = new Pegawai;
        $pegawai->pegawai_nama = request('pegawai_nama');
        $pegawai->pegawai_jabatan = request('pegawai_jabatan');
        $pegawai->pegawai_nip = request('pegawai_nip');
        $pegawai->email = request('email');
        $pegawai->pegawai_wa = request('pegawai_wa');
        $pegawai->password = bcrypt(request('pegawai_nip'));
        $pegawai->pegawai_tingkat = request('pegawai_tingkat');
        $pegawai->pegawai_status = request('pegawai_status');
        $pegawai->pegawai_bidang = request('pegawai_bidang');
        $pegawai->save();
        return redirect('admin/data-pegawai')->with('success','Data pegawai berhasil ditambah');
    }

    function resetAll(){
        Pegawai::where('password',123)->update([
            'password' => bcrypt(12345)
        ]);

        return back()->with('success','Password default set 12345');
    }

    function show(Pegawai $pegawai){
        $data['detail'] = $pegawai;
        return view('admin.pegawai.show',$data);
    }

    function destroy(Pegawai $pegawai){
       $pegawai->flag_erase = 0;
       $pegawai->save();
       return back()->with('warning','Data berhasil dihapus');
   }

   function edit(Pegawai $pegawai){
      $data['detail'] = $pegawai;
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
      return view('admin.pegawai.edit',$data);

  }

   function update(Pegawai $pegawai){
        $pegawai->pegawai_nama = request('pegawai_nama');
        $pegawai->pegawai_jabatan = request('pegawai_jabatan');
        $pegawai->pegawai_nip = request('pegawai_nip');
        $pegawai->email = request('email');
        $pegawai->pegawai_wa = request('pegawai_wa');
        $pegawai->password = bcrypt(request('pegawai_nip'));
        $pegawai->pegawai_tingkat = request('pegawai_tingkat');
        $pegawai->pegawai_status = request('pegawai_status');
        $pegawai->pegawai_bidang = request('pegawai_bidang');
        $pegawai->save();
        return redirect('admin/data-pegawai')->with('success','Data pegawai berhasil diupdate');
    }


}
