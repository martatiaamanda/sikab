<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usaha extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 7,
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
                'name' => 'pekerjaan',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'masa_berlaku',
                'type' => 'text',
                'title' => 'Masa Berlaku',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_usaha = DataType::create([
            'name' => 'Data Usaha',
            'jenis_surat_id' => 7,
        ]);

        $data_usaha->input_fields()->createMany([
            [
                'name' => 'nama_usaha',
                'type' => 'text',
                'title' => 'Nama Usaha',
                'validate' => 'required'
            ],
            [
                'name' => 'ukuran',
                'type' => 'text',
                'title' => 'Berukuran',
                'validate' => 'required'
            ],
            [
                'name' => 'lokasi',
                'type' => 'text-large',
                'title' => 'Berlokasi di ',
                'validate' => 'required'
            ],
        ]);

        
        $data_document = DataType::create([
            'name' => 'Data Dokumen',
            'jenis_surat_id' => 7,
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
