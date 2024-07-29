<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $primaryKey = 'peserta_id';
    protected $with = ['pegawai','rapat'];

    function pegawai(){
        return $this->belongsTo(Pegawai::class, 'peserta_pegawai_id');
    }
    function rapat(){
        return $this->belongsTo(Jadwal::class, 'peserta_jadwal_id');
    }

}
