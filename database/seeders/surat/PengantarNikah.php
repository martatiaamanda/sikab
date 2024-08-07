<?php

namespace Database\Seeders\surat;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengantarNikah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_diri = DataType::create([
            'name' => 'Data Diri',
            'jenis_surat_id' => 11,

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
                'type' => 'number',
                'title' => 'NIK',
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

        $data_perkawinan = DataType::create([
            'name' => 'Data Perkawinan',
            'jenis_surat_id' => 11,

        ]);

        $data_perkawinan->input_fields()->createMany([
            [
                'name' => 'laki_laki',
                'type' => 'text',
                'title' => 'Laki-laki (Jejaka/Duda)',
                'validate' => 'required'
            ],
            [
                'name' => 'istri_ke',
                'type' => 'number',
                'title' => 'atau Istri ke',
                'validate' => 'required'
            ],
            [
                'name' => 'perempuan',
                'type' => 'text',
                'title' => 'Perempuan (Perawan/Janda)',
                'validate' => 'required'
            ],
            [
                'name' => 'pasangan_terdahulu',
                'type' => 'text',
                'title' => 'Nama istri/suami terdahulu',
                'validate' => 'required'
            ],
        ]);

        $data_ayah = DataType::create([
            'name' => 'Data Ayah',
            'jenis_surat_id' => 11,
        ]);

        $data_ayah->input_fields()->createMany([
            [
                'name' => 'nama_ayah',
                'type' => 'text',
                'title' => 'Nama Ayah',
                'validate' => 'required'
            ],
            [
                'name' => 'nik_ayah',
                'type' => 'number',
                'title' => 'Nomor Induk Kependudukan(NIK)',
                'validate' => 'required'
            ],
            [
                'name' => 'tempat_lahir_ayah',
                'type' => 'text',
                'title' => 'Tempat Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'tanggal_lahir_ayah',
                'type' => 'date',
                'title' => 'Tanggal Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'agama_ayah',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'kewarganegaraan_ayah',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan_ayah',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat_ayah',
                'type' => 'text-large',
                'title' => 'Alamat Lengkap',
                'validate' => 'required'
            ],
        ]);

        $data_ibu = DataType::create([
            'name' => 'Data Ibu',
            'jenis_surat_id' => 11,
        ]);

        $data_ibu->input_fields()->createMany([
            [
                'name' => 'nama_ibu',
                'type' => 'text',
                'title' => 'Nama Ibu',
                'validate' => 'required'
            ],
            [
                'name' => 'nik_ibu',
                'type' => 'number',
                'title' => 'Nomor Induk Kependudukan(NIK)',
                'validate' => 'required'
            ],
            [
                'name' => 'tempat_lahir_ibu',
                'type' => 'text',
                'title' => 'Tempat Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'tanggal_lahir_ibu',
                'type' => 'date',
                'title' => 'Tanggal Lahir',
                'validate' => 'required'
            ],
            [
                'name' => 'agama_ibu',
                'type' => 'text',
                'title' => 'Agama',
                'validate' => 'required'
            ],
            [
                'name' => 'kewarganegaraan_ibu',
                'type' => 'text',
                'title' => 'Kewarganegaraan',
                'validate' => 'required'
            ],
            [
                'name' => 'pekerjaan_ibu',
                'type' => 'text',
                'title' => 'Pekerjaan',
                'validate' => 'required'
            ],
            [
                'name' => 'alamat_ibu',
                'type' => 'text-large',
                'title' => 'Alamat Lengkap',
                'validate' => 'required'
            ],
        ]);

        
        $data_document = DataType::create([
            'name' => 'Data Dokumen',
            'jenis_surat_id' => 11,
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
