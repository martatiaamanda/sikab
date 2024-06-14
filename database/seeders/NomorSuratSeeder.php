<?php

namespace Database\Seeders;

use App\Models\NomorSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NomorSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nomor_surat =  NomorSurat::create([
            'awal' => '474 /',
            'akhir' => '/V.07/VI.42/V',
            'tahun' => '2024'
        ]);
    }
}
