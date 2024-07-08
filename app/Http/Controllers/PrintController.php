<?php

namespace App\Http\Controllers;

use App\Models\lurah;
use App\Models\surat;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Mpdf\Mpdf;

class PrintController extends Controller
{
    public function view($id)
    {
        $lurah = lurah::first();
        if ($lurah->tanda_tangan == null or $lurah->stemple == null) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Tanda Tangan Lurah atau stempel Belum Diatur');
        }
        $surat  = surat::where('id', $id)->first();
        if (!$surat){
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        if($surat->status != 'diterima') {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat belum disetujui');
        }

        if ($surat->jenis_surat->slug == 'surat-pindah') {
            $surat_value = $surat->surat_pindah;

            return view('user.surat.cetak.surat-pindah', compact('lurah', 'surat', 'surat_value'));
        }

        $surat_value = new Collection(); 
        foreach ($surat->input_value as $value) {
            $surat_value[$value->input_field->name] = $value->value;
        }
        $view = 'user.surat.cetak.' . $surat->jenis_surat->slug;
        return view( $view, compact( 'lurah', 'surat','surat_value'));
    }

    public function cetak($id)
    {
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => [216, 330],
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 0,
            'margin_bottom' => 10

        ]);

        $lurah = lurah::first();
        if ($lurah->tanda_tangan == null or $lurah->stemple == null) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Tanda Tangan Lurah atau stempel Belum Diatur');
        }
        $surat  = surat::where('id', $id)->first();
        if (!$surat){
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        if($surat->status != 'diterima') {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat belum disetujui');
        }

        if ($surat->jenis_surat->slug == 'surat-pindah') {
            $surat_value = $surat->surat_pindah;

            return view('user.surat.cetak.surat-pindah', compact('lurah', 'surat', 'surat_value'));
        }

        $surat_value = new Collection(); 
        foreach ($surat->input_value as $value) {
            $surat_value[$value->input_field->name] = $value->value;
        }
        $view = 'user.surat.cetak.' . $surat->jenis_surat->slug;
        // dd($view);
        // return view( $view, compact( 'lurah', 'surat','surat_value'));
        $html = view($view, compact('lurah', 'surat', 'surat_value'))->render();

        // return $html;

        $mpdf->WriteHTML($html);

        // $mpdf->WriteHTML(view($view, compact('lurah', 'surat', 'surat_value'))->render());\
        // $mpdf->WriteHTML(view('user.surat.cetak.kelahiran' ,[ 'lurah' => $lurah, 'surat' => $surat]));
        $mpdf->Output('document.pdf', 'I');
    }
}
