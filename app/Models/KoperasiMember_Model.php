<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoperasiMember_Model extends Model
{
    use HasFactory;
    protected $table ='koperasi_member';
    protected $fileable= [
        'nama',
        'id_provinsi',
        'id_kotakabupaten'
        
    ];
}
