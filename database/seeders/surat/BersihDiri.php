<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BersihDiri extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 6,

        ]);

        $data_diri->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'name' => 'nik',
                'type' => 'text',
                'title' => 'NIK/KTP',
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
                'name' => 'jenis_kelamin',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
                'validate' => 'required'
            ],
            [
                'name' => 'agama',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'kewarganegaraan',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
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
                'type' => 'option',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_ibu = DataType::create([
            'name' => 'Data Ibu',
            'jenis_surat_id' => 6,
        ]);
        $data_ibu->input_fields()->createMany([
            [
                'name' => 'nama_ibu',
                'type' => 'option',
                'title' => 'Nama Ibu',
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
                'name' => 'jenis_kelamin',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
                'validate' => 'required'
            ],
            [
                'name' => 'agama',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'kewarganegaraan',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
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
                'type' => 'option',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_ayah = DataType::create([
            'name' => 'Data Ayah',
            'jenis_surat_id' => 6,
        ]);

        $data_ayah->input_fields()->createMany([
            [
                'name' => 'nama_ayah',
                'type' => 'option',
                'title' => 'Nama Ayah',
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
                'name' => 'jenis_kelamin',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
                'validate' => 'required'
            ],
            [
                'name' => 'agama',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'kewarganegaraan',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
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
                'type' => 'text',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_Dokumen = DataType::create([
            'name' => 'Data Lainnya',
            'jenis_surat_id' => 6,
        ]);
        $data_Dokumen->input_fields()->createMany([
            [
                'name' => 'keperluan',
                'type' => 'text',
                'title' => 'Keperluan',
                'validate' => 'required'
            ],
        ]);
    }
}
