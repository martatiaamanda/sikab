<?php

namespace App\Exports;

use App\Models\Bansos;
use App\View\Components\profile\index;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataBansos implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $bansosList = Bansos::with('data_bansos')->where('status', 'diterima')->get();
        // dd($bansosList);

        $dataExport = new \Illuminate\Support\Collection();

        if ($bansosList->isEmpty()) {
            return $dataExport;
        }

        foreach ($bansosList as  $bansos) {
        //    dd($bansos);
            $dataExport->push([
                'No' => $bansos->id,
                'NIK' => $bansos->data_bansos->ktp,
                'Nama' => $bansos->data_bansos->nama,
                'Alamat' => $bansos->data_bansos->alamat,
            ]);
        }

        return $dataExport;
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama',
            'Alamat',
        ];
    }
}
