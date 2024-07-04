<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BelumMenikah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 12,
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
                'name' => 'satus_perkawianan',
                'type' => 'text',
                'title' => 'Satus Perkawinan',
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
                'type' => 'text',
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

        $data_lain = DataType::create([
            'name' => 'Data Lainnya',
            'jenis_surat_id' => 12,
        ]);

        $data_lain->input_fields()->createMany([
            [
                'name' => 'keperluan',
                'type' => 'text-large',
                'title' => 'Keperluan',
                'validate' => 'required'
            ],
        ]);

        
        $data_document = DataType::create([
            'name' => 'Data Dokumen',
            'jenis_surat_id' => 12,
        ]);

        $data_document->input_fields()->createMany([
            [
                'name' => 'ktp',
                'type' => 'file',
                'title' => 'KTP',
                'validate' => null
            ],
            [
                'name' => 'kk',
                'type' => 'file',
                'title' => 'KK',
                'validate' => null
            ],
        ]);
    }
}
