<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KependudukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 1,

        ]);

        $data_diri->input_fields()->createMany([
            [
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama Lengkap',
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
                'name' => 'alamat',
                'type' => 'text-large',
                'title' => 'Almat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_ibu = DataType::create([
            'name' => 'Data Ibu',
            'jenis_surat_id' => 1,
        ]);
        $data_ibu->input_fields()->createMany([
            [
                'name' => 'nama_ibu',
                'type' => 'text',
                'title' => 'Nama Ibu',
                'validate' => 'required'
            ],
            [
                'name' => 'umur_ibu',
                'type' => 'text',
                'title' => 'Umur Ibu',
                'validate' => 'required'
            ],
            [
                'name' => 'Pekerjaan_ibu',
                'type' => 'text',
                'title' => 'Pekerjaan Ibu',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat_ibu',
                'type' => 'text-large',
                'title' => 'Almat Ibu',
                'validate' => 'required'
            ],
        ]);

        $data_ayah = DataType::create([
            'name' => 'Data Ayah',
            'jenis_surat_id' => 1,
        ]);

        $data_ayah->input_fields()->createMany([
            [
                'name' => 'nama_ayah',
                'type' => 'text',
                'title' => 'Nama Ayah',
                'validate' => 'required'
            ],
            [
                'name' => 'umur_ayah',
                'type' => 'text',
                'title' => 'Umur Ayah',
                'validate' => 'required'
            ],
            [
                'name' => 'Pekerjaan_ayah',
                'type' => 'text',
                'title' => 'Pekerjaan Ayah',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat_ayah',
                'type' => 'text-large',
                'title' => 'Almat Ayah',
                'validate' => 'required'
            ],
        ]);

        $data_Dokumen = DataType::create([
            'name' => 'Data Dokumen',
            'jenis_surat_id' => 1,
        ]);
        $data_Dokumen->input_fields()->createMany([
            [
                'name' => 'kartu_keluarga',
                'type' => 'file',
                'title' => 'Scan Dokumen Kartu Keluarga',
                'validate' => 'required'
            ],
            [
                'name' => 'KTP',
                'type' => 'file',
                'title' => 'Scan Dokumen KTP Asli',
                'validate' => 'required'
            ],
            [
                'name' => 'SKTM',
                'type' => 'file',
                'title' => 'Surat Keterangan Tidak Mampu dari RT/RW Setempat',
                'validate' => 'required'
            ],
        ]);
    }
}
