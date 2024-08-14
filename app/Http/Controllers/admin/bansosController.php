<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use Illuminate\Http\Request;

class bansosController extends Controller
{
    //
    public function index()
    {

        $histories = Bansos::orderByDesc('id')->get();
        $page_title = 'Kelola Bansos';
        return view('admin.bansos.riwayat', compact('histories', 'page_title'));
    }

    public function pengajuan()
    {
        $histories = Bansos::where('status', '!=', 'diterima')->orderByDesc('id')->get();
        $page_title = 'Permohonan Bansos';

        return view('admin.bansos.riwayat', compact('histories', 'page_title'));
    }

    public function done()
    {
        $histories = Bansos::where('status', 'diterima')->orderByDesc('id')->get();
        $page_title = 'Bansos Selesai';

        return view('admin.bansos.riwayat', compact('histories', 'page_title'));
    }

    public function show($id)
    {
        $bansos = Bansos::where('id', $id)->first();
        if (!$bansos) {
            return redirect()->route('admin.bansos')->with('error', 'Bansos Tidak Ditemukan');
        }

        return view('admin.bansos.show', compact('bansos'));
    }

    public function edit($id)
    {
        $bansos = Bansos::where('id', $id)->first();
        if (!$bansos) {
            return redirect()->route('admin.bansos')->with('error', 'Bansos Tidak Ditemukan');
        }

        return view('admin.bansos.edit', compact('bansos'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $bansos = Bansos::where('id', $id)->first();
        if (!$bansos) {
            return redirect()->route('admin.bansos')->with('error', 'Bansos Tidak Ditemukan');
        }

        // dd($request);

        $request->validate([
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        if ($request->status == 'diterima') {
            // $request->validate([
            //     'nomor_bansos' => 'required',
            // ]);
            // $bansos->nomor_bansos = $request->nomor_bansos;
            $bansos->tanggal_disetujui = now();
        }

        $bansos->status = $request->status;
        $bansos->catatan = $request->catatan;
        $bansos->save();

        return redirect()->route('admin.bansos.show', [$id])->with('success', 'bansos Berhasil Dikonfirmasi');
    }
}
