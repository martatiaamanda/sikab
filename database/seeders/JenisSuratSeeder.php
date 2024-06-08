<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Surat Keterangan Domisili',
                'slug' => 'surat-domisili',
                'icon' => 'fa-people-group'
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'slug' => 'surat-tidak-mampu',
                'icon' => 'fa-hand-holding-dollar'
            ],
            [
                'name' => 'Surat Kematian',
                'slug' => 'surat-kematian',
                'icon' => 'fa-bed-pulse'
            ],
            [
                'name' => 'Surat Keterangan ',
                'slug' => 'surat-keterangan',
                'icon' => 'fa-shop'
            ],
            [
                'name' => 'Surat Keterangan Sudah Menikah',
                'slug' => 'surat-sudah-menikah',
                'icon' => 'fa-heart-circle-check'
            ],
            [
                'name' => 'Surat Keterangan Bersih Diri',
                'slug' => 'surat-bersih-diri',
                'icon' => 'fa-hand-sparkles'
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'slug' => 'surat-keterangan-usaha',
                'icon' => 'fa-shop'
            ],
            [
                'name' => 'Surat Keterangan pindah',
                'slug' => 'surat-pindah',
                'icon' => 'fa-suitcase-rolling'
            ],
            [
                'name' => 'Surat Keterangan penghasilan',
                'slug' => 'surat-penghasilan',
                'icon' => 'fa-hand-holding-dollar'
            ],
            [
                'name' => 'Surat Pengantar SKCK',
                'slug' => 'surat-skck',
                'icon' => 'fa-file-invoice'
            ],

            // [
            //     'name' => 'Surat Keterangan Belum Menikah',
            //     'slug' => 'surat-belum-menikah',
            //     'icon' => 'fa-heart-circle-xmark'
            // ],
            // [
            //     'name' => 'Surat Keterangan Sudah Menikah',
            //     'slug' => 'surat-sudah-menikah',
            //     'icon' => 'fa-heart-circle-check'
            // ],
            // [
            //     'name' => 'Surat Keterangan Pengantar Nikah',
            //     'slug' => 'surat-pengantar-nikah',
            //     'icon' => 'fa-hand-holding-heart'
            // ],
            // [
            //     'name' => 'Surat Keterangan Kelahiran',
            //     'slug' => 'surat-kelahiran',
            //     'icon' => 'fa-baby'
            // ],
            // [
            //     'name' => 'Surat Pengantar SKCK',
            //     'slug' => 'surat-skck',
            //     'icon' => 'fa-file-invoice'
            // ],
            
            // [
            //     'name' => 'Surat Keterangan Domisili',
            //     'slug' => 'surat-domisili',
            //     'icon' => 'fa-map-location-dot'
            // ],
        ];

        JenisSurat::insert($data);
    }
}
