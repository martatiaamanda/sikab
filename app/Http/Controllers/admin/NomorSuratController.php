<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NomorSurat;
use Illuminate\Http\Request;

class NomorSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nomor_surat = NomorSurat::first();
        return view('admin.master.nomor_surat', compact('nomor_surat'));
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'awal' => 'required',
            'akhir' => 'required',
            'tahun' => 'required'
        ], [
            'awal.required' => 'Nomor Surat Awal harus diisi',
            'akhir.required' => 'Nomor Surat Akhir harus diisi',
            'tahun.required' => 'Tahun harus diisi'
        ]);

        $nomor_surat = NomorSurat::first();

        $nomor_surat->update([
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('admin.nomor-surat')->with('success', 'Nomor Surat berhasil diupdate');
    }
}
