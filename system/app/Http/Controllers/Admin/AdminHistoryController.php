<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pegawai;

class AdminHistoryController extends Controller
{
    function index(){
        $data['list_jadwal'] = Jadwal::where('flag_erase',1)->get();
        $data['total'] = Jadwal::where('flag_erase',1)->count();
        return view('admin.history.index',$data);
    }
}
