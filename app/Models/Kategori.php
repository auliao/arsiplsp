<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // nama tabel di database

    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];
}
