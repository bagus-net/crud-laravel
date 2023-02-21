<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Model extends Model
{
    protected $table ='spk_users';
    protected $fileable= [
        'username',
        'password',
        'nama_lengkap',
        'divisi'
    ];
}
