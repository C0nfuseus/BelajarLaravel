<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_masuk extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_surat';
    use HasFactory;
}
