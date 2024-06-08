<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Pindah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 8,
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
                'name' => 'perkawinan',
                'type' => 'text',
                'title' => 'Status Perkawinan',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'pendidikan',
                'type' => 'text',
                'title' => 'Pendidikan',
                'validate' => 'required'
            ],
            [
                'name' => 'no_kk',
                'type' => 'number',
                'title' => 'Nomor KK',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_pindah = DataType::create([
            'name' => 'Tujuan Pindah',
            'jenis_surat_id' => 8,
        ]);

        $data_pindah->input_fields()->createMany([
            [
                'name' => 'jalan',
                'type' => 'text',
                'title' => 'Jalan',
                'validate' => 'required'
            ],
            [
                'name' => 'desa',
                'type' => 'text',
                'title' => 'Desa/Kelurahan',
                'validate' => 'required'
            ],
            [
                'name' => 'kecamatan',
                'type' => 'text',
                'title' => 'Kecamatan',
                'validate' => 'required'
            ],
            [
                'name' => 'kab',
                'type' => 'text',
                'title' => 'Kab/Kota',
                'validate' => 'required'
            ],
            [
                'name' => 'prov',
                'type' => 'text',
                'title' => 'Provinsi',
                'validate' => 'required'
            ],
        ]);

        // $data_Lain  =DataType::create([
        //     'name' => 'Data Lainnya',
        //     'jenis_surat_id' => 8,
        // ]);

        // $data_Lain->sub_input_fields()


    }
}
