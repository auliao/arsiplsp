<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'kategori',
        'judul',
        'waktu_pengarsipan',
        'file_path',
        'original_filename'
    ];

    protected $casts = [
        'waktu_pengarsipan' => 'datetime',
    ];

    public function getFormattedWaktuPengarsipanAttribute()
    {
        return $this->waktu_pengarsipan->format('Y-m-d H:i');
    }
}