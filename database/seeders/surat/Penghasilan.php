<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Penghasilan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data_ayah = DataType::create([
            'name' => 'Data Ayah',
            'jenis_surat_id' => 9,
        ]);

        $data_ayah->input_fields()->createMany([
            [
                'name' => 'nama_ayah',
                'type' => 'text',
                'title' => 'Nama Ayah',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan_ayah',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'penghasilan_ayah',
                'type' => 'text',
                'title' => 'Penghasilan Pokok',
                'validate' => 'required'
            ],
            [
                'name' => 'penghasilan_tambahan_ayah',
                'type' => 'text',
                'title' => 'Penghasilan Tambahan',
                'validate' => 'required'
            ]
        ]);
        $data_ibu = DataType::create([
            'name' => 'Data Ibu',
            'jenis_surat_id' => 9,
        ]);

        $data_ibu->input_fields()->createMany([
            [
                'name' => 'nama_ibu',
                'type' => 'text',
                'title' => 'Nama Ibu',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan_ibu',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'penghasilan_ibu',
                'type' => 'text',
                'title' => 'Penghasilan Pokok',
                'validate' => 'required'
            ],
            [
                'name' => 'penghasilan_tambahan_ibu',
                'type' => 'text',
                'title' => 'Penghasilan Tambahan',
                'validate' => 'required'
            ]
        ]);

        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 9,
        ]);

        $data_diri->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'name' => 'tempat_lahir',
                'type' => 'text',
                'title' => 'Tempat Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'tanggal_lahir',
                'type' => 'date',
                'title' => 'Tanggal Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Alamat',
                'validate' => 'required'   
            ]
        ]);

        
    }
}
