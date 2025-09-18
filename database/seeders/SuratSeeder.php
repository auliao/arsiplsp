<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;
use Carbon\Carbon;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surats = [
            [
                'nomor_surat' => '2022/PD3/TU/001',
                'kategori' => 'Pengumuman',
                'judul' => 'Nota Dinas WFH',
                'waktu_pengarsipan' => Carbon::create(2023, 6, 21, 17, 23),
                'file_path' => null, // File akan diisi manual atau dengan factory
                'original_filename' => 'nota_dinas_wfh.pdf',
            ],
            [
                'nomor_surat' => '2022/PD2/TU/022',
                'kategori' => 'Undangan',
                'judul' => 'Undangan Halal Bi Halal',
                'waktu_pengarsipan' => Carbon::create(2023, 4, 21, 18, 23),
                'file_path' => null, // File akan diisi manual atau dengan factory
                'original_filename' => 'undangan_halal_bi_halal.pdf',
            ],
        ];

        foreach ($surats as $surat) {
            Surat::create($surat);
        }
    }
}