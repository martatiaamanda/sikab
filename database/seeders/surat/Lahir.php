<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Lahir extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 13,
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

        $data_ayah = DataType::create([
            'name' => 'Data Ayah',
            'jenis_surat_id' => 13,
        ]);

        $data_ayah->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama',
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
                'title' => 'Alamat',
                'validate' => 'required'
            ],
        ]);
        $datab = DataType::create([
            'name' => 'Data Ibu',
            'jenis_surat_id' => 13,
        ]);

        $datab->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama',
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
                'title' => 'Alamat',
                'validate' => 'required'
            ],
        ]);
    }
}
