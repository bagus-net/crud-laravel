<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoperasiKota_Model extends Model
{
    use HasFactory;
    protected $table ='koperasi_kota';
    protected $fileable= [
        'id_provinsi',
        'kota'
        
    ];
}
