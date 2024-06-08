<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\surat\BersihDiri;
use Database\Seeders\surat\Domisili;
use Database\Seeders\surat\Kematian;
use Database\Seeders\surat\Ket;
use Database\Seeders\surat\Menikah;
use Database\Seeders\surat\Sktm;
use Database\Seeders\surat\Usaha;
use Illuminate\Database\Seeder;

class DataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->call([
            Domisili::class,
            Sktm::class,
            Kematian::class,
            Ket::class,
            Menikah::class,
            BersihDiri::class,
            Usaha::class,
            // KependudukanSeeder::class,
        ]);

    }
}
