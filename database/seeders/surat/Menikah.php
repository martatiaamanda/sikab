<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Menikah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_diri = DataType::create([
            'name' => 'Data Suami',
            'jenis_surat_id' => 5,
        ]);


        $data_diri->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'name' => 'jenis_kelamin',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
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
                'name' => 'kewarganegaraan',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
                'validate' => 'required'
            ],
            [
                'name' => 'agama',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);
        $data_istri = DataType::create([
            'name' => 'Data Istri',
            'jenis_surat_id' => 5,
        ]);


        $data_istri->input_fields()->createMany([
            [
                'name' => 'nama_istri',
                'type' => 'text',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'name' => 'jenis_kelamin_istri',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
                'validate' => 'required'
            ],
            [
                'name' => 'tempat_lahir_istri',
                'type' => 'text',
                'title' => 'Tempat Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'tanggal_lahir_istri',
                'type' => 'date',
                'title' => 'Tanggal Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'kewarganegaraan_istri',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
                'validate' => 'required'
            ],
            [
                'name' => 'agama_istri',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan_istri',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat_istri',
                'type' => 'text-large',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_lain = DataType::create([
            'name' => 'Data lainnya',
            'jenis_surat_id' => 5,
        ]);

        $data_lain->input_fields()->createMany([
            [
                'name' => 'tanggal_nikah',
                'type' => 'date',
                'title' => 'Tanggal Nikah',
                'validate' => 'required'
            ],
        ]);
        
    }
}
