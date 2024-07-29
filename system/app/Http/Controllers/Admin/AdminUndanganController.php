<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class AdminUndanganController extends Controller
{
    function index(){
         $data['list_pegawai'] = Pegawai::all();
        return view('admin.undangan.index',$data);
    }
}
