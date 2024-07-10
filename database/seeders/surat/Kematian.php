<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kematian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_diri = DataType::create([
            'name' => 'Data Identitas',
            'jenis_surat_id' => 3,
        ]);


        $data_diri->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'name' => 'bin',
                'type' => 'text',
                'title' => 'Bin/Binti',
                'validate' => 'required'
            ],
            [
                'name' => 'jenis_kelamin',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Alamat Lengkap',
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
                'name' => 'perkawinan',
                'type' => 'text',
                'title' => 'Status Perkawinan',
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
                'name' => 'tanggal_kematian',
                'type' => 'date',
                'title' => 'Tanggal Kematian',
                'validate' => 'required'
            ],
            [
                'name' => 'tempat_kematian',
                'type' => 'text',
                'title' => 'Tempat Kematian',
                'validate' => 'required'
            ],
            [
                'name' => 'tempat_pemakaman',
                'type' => 'text',
                'title' => 'Tempat Pemakaman',
                'validate' => 'required'
            ],
            [
                'name' => 'sebab_kematian',
                'type' => 'text',
                'title' => 'Sebab Kematian',
                'validate' => 'required'
            ],
            [
                'name' => 'penentu_kematian',
                'type' => 'text',
                'title' => 'Yang Menentukan Kematian',
                'validate' => 'required'
            ],
            [
                'name' => 'no_kk',
                'type' => 'number',
                'title' => 'Nomor KK',
                'validate' => 'required'
            ],
        ]);

        
        $data_document = DataType::create([
            'name' => 'Data Dokumen',
            'jenis_surat_id' => 3,
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
