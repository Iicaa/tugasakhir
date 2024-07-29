<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateCode extends Model
{
    use HasFactory;
    protected $table = 'code_generate';
    protected $primaryKey = 'code_generate_id';
}
