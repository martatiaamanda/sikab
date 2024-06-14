<?php

namespace Database\Seeders;

use App\Models\lurah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $lurah = lurah::create([
            'name' => 'Test Lurah',
            'NIP' => '1234567890123456',
            'awal_jabatan' => '2020',
            'akhir_jabatan' => '2025',
            // 'tanda_tangan' => 'ttd_1234567890123456.png',
        ]);
    }
}
