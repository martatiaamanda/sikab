<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\JenisSurat;
use App\Models\surat;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AdminSuratController extends Controller
{
    public function index()
    {
        $histories = surat::orderByDesc('id')->paginate(10);
        $page_title = 'Kelola Surat';

        return view('admin.surat.riwayat', compact('histories', 'page_title'));
    }

    public function pengajuan()
    {
        $histories = surat::where('status', '!=', 'diterima')->orderByDesc('id')->paginate(10);
        $page_title = 'Permohonan Surat';

        return view('admin.surat.riwayat', compact('histories', 'page_title'));
    }

    public function done()
    {
        $histories = surat::where('status', 'diterima')->orderByDesc('id')->paginate(10);
        $page_title = 'Surat Selesai';

        return view('admin.surat.riwayat', compact('histories', 'page_title'));
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
}


