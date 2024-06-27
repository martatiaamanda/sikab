<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\JenisSurat;
use App\Models\lurah;
use App\Models\surat;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RiwayatSuratControllercd extends Controller
{
    public function index()
    {
        $histories = surat::where('user_id', auth()->user()->id)->orderByDesc('id')->paginate(10);

        // dd ($surats[0]->input_value);
        // $histories = JenisSurat::paginate(10);
        return view('user.riwayat-surat', compact('histories'));
    }

    public function show($id)
    {
        $history = surat::where('id', $id)->first();
        if (!$history) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        $jenis_surat = JenisSurat::where('id', $history->jenis_surat->id)->first();
        // $mail_types = JenisSurat::all();
        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }

        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();

        $surat_value = new Collection(); // Inisialisasi koleksi objek

        $surat_value = [];
        foreach ($history->input_value as $value) {
            $surat_value[$value->input_field->id] = $value->value;
        }

        return view('user.surat.show', compact('history', 'surat_value',  'data_types', 'jenis_surat'));
    }

    public function edit($id)
    {
        $history = surat::where('id', $id)->first();
        if (!$history) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        $jenis_surat = JenisSurat::where('id', $history->jenis_surat->id)->first();
        // $mail_types = JenisSurat::all();
        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }

        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();

        $surat_value = new Collection(); // Inisialisasi koleksi objek

        $surat_value = [];
        foreach ($history->input_value as $value) {
            $surat_value[$value->input_field->id] = $value->value;
        }

        return view('user.surat.edit', compact('history', 'surat_value',  'data_types', 'jenis_surat'));
    
    }

    public function destroy($id)
    {
        $history = surat::where('id', $id)->first();
        if (!$history) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        $history->delete();

        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil Dihapus');
    }

    public function print($id)
    {
        $lurah = lurah::first();
        if ($lurah->tanda_tangan == null) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Tanda Tangan Lurah Belum Diatur');
        }
        $surat  = surat::where('id', $id)->first();
        if (!$surat && $surat->jenis_surat->slug != 'surat-domisili'){
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        if($surat->status != 'diterima') {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat belum disetujui');
        }

        $surat_value = new Collection(); // Inisialisasi koleksi objek
        foreach ($surat->input_value as $value) {
            $surat_value[$value->input_field->name] = $value->value;
        }
        $view = 'user.surat.cetak.' . $surat->jenis_surat->slug;
        return view( $view, compact( 'lurah', 'surat','surat_value'));
        // dd($surat_value);
    }
}
