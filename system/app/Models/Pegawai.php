<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class Pegawai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'pegawai';
    protected $primaryKey = 'pegawai_id';

    function bidang(){
        return $this->belongsTo(Bidang::class,'pegawai_bidang');
    }

    function handleUploadFoto(){
        if(request()->hasFile('pegawai_foto')){
          $file = request()->file('pegawai_foto');
          $destination = "pegawai";
          $randomStr = Str::random(5);
          $filename = "pegawai-".time()."-".$randomStr.".".$file->extension();
          $url = $file->storeAs($destination, $filename);
          $this->karyawan_foto = "app/".$url;
          $this->save;
    }

   
}
}
