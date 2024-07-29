<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
class AdminProfilController extends Controller
{
    function index(){
        $data['auth'] = Auth::user();
        return view('admin.profil.index');
    }

    function update(){
        $auth = Auth::user();
        $new = request('new');
        $konfirmasi = request('konfirmasi');

        if($new == $konfirmasi){
            Admin::where('admin_id',$auth->admin_id)->update([
                'password' => bcrypt($new)
            ]);
            return back()->with('success','Password berhasil diganti');
        }else{
             return back()->with('warning','Password tidak sama');
        }
    }
}
