<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoperasiProvinsi_Model extends Model
{
    use HasFactory;
    protected $table ='koperasi_provinsi';
    protected $fileable= [
        'provinsi'
        
    ];
}
