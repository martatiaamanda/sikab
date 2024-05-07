<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\JenisSurat;
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

        // dd($history->input_value);
        $surat_value = new Collection(); // Inisialisasi koleksi objek

        // foreach ($history->input_value as $value) {
        //     $temp = (object) [
        //         'input_field_id' => $value->input_field->id,
        //         'value' => $value->value,
        //     ];

        //     $surat_value->push($temp); // Tambahkan objek ke dalam koleksi
        //     }
        $surat_value = [];
        foreach ($history->input_value as $value) {
            $surat_value[$value->input_field->id] = $value->value;
        }

        // dd($history);

        return view('user.surat.show', compact('history', 'surat_value',  'data_types', 'jenis_surat'));
    }
}
