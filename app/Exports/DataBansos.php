<?php

namespace App\Exports;

use App\Models\Bansos;
use App\View\Components\profile\index;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataBansos implements FromCollection, WithHeadings
{

    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $bansosList = Bansos::with('data_bansos')
            ->where('status', 'diterima')
            ->whereBetween('tanggal_disetujui', [$this->startDate, $this->endDate])
            ->get();

        // dd($bansosList);

        $dataExport = new \Illuminate\Support\Collection();

        if ($bansosList->isEmpty()) {
            return $dataExport;
        }

        foreach ($bansosList as $index =>  $bansos) {
            //    dd($bansos);
            $dataExport->push([
                'No' => $index + 1,
                'NIK' => $bansos->data_bansos->nik,
                'Nama' => $bansos->data_bansos->nama,
                'Alamat' => $bansos->data_bansos->alamat,
                'Tanggal Disetujui' => $bansos->tanggal_disetujui,
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
            'Tanggal Disetujui',
        ];
    }
}
