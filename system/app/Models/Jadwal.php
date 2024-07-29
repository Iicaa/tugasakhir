<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $primaryKey = 'jadwal_id';

     function handleUploadFile()
    {

        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $destination = 'public/paparan';
            $randomStr = Str::random(10);
            $filename = $destination . "/" . $randomStr . "." . $file->extension();
            $url = $file->move($destination, $filename);
            $this->file = $filename;
            $this->save;
        }
    }

}

