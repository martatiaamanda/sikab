<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Skck extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 10,
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
                'name' => 'no_kk',
                'type' => 'number',
                'title' => 'Nomor KK',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Alamat',
                'validate' => 'required'
            ],
            [
                'name' => 'kelurahan',
                'type' => 'text',
                'title' => 'Kelurahan',
                'validate' => 'required'
            ],
            [
                'name' => 'kecamatan',
                'type' => 'text',
                'title' => 'Kecamatan',
                'validate' => 'required'
            ],
            [
                'name' => 'Keperluan',
                'type' => 'text',
                'title' => 'Keperluan',
                'validate' => 'required'
            ],
        ]);
    }
}
