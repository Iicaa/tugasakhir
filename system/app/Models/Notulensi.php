<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class Notulensi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'notulensi';
    protected $primaryKey = 'notulensi_id';

}
