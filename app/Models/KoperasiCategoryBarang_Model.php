<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoperasiCategoryBarang_Model extends Model
{
    use HasFactory;
    protected $table ='koperasi_category_barang';
    protected $fileable= [
        'category_barang',
    ];
}
