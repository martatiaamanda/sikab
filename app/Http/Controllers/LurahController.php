<?php

namespace App\Http\Controllers;

use App\Models\lurah;
use Illuminate\Http\Request;

class LurahController extends Controller
{

    protected function uploadFile($file, $NIP, ) {

        $file_name = time(). '-' . $NIP . '-' . $file->getClientOriginalName();
        $file->storeAs('public/lurah', $file_name);

        return $file_name;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $lurah = lurah::first();

        return view('admin.master.lurah', compact('lurah'));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lurah $lurah)
    {
        //
        $request->validate([
            'name' => 'required',
            'NIP' => 'required',
            'awal_jabatan' => 'required',
            'akhir_jabatan' => 'required',
            'tanda_tangan' => 'required|image|mimes:png|max:2048',
            ], [
                'name.required' => 'Nama Lurah tidak boleh kosong',
                'NIP.required' => 'NIP tidak boleh kosong',
                'awal_jabatan.required' => 'Tahun Awal Jabatan tidak boleh kosong',
                'akhir_jabatan.required' => 'Tahun Akhir Jabatan tidak boleh kosong',
                'tanda_tangan.required' => 'Tanda Tangan tidak boleh kosong',
                'tanda_tangan.image' => 'Tanda Tangan harus berupa gambar',
                'tanda_tangan.mimes' => 'Tanda Tangan harus berupa gambar dengan format PNG',
                'tanda_tangan.max' => 'Tanda Tangan tidak boleh lebih dari 2MB',
                
            ]);


        $lurah = $lurah->first();
        $lurah->name = $request->name;
        $lurah->NIP = $request->NIP;
        $lurah->awal_jabatan = $request->awal_jabatan;
        $lurah->akhir_jabatan = $request->akhir_jabatan;
        $lurah->tanda_tangan = $this->uploadFile($request->file('tanda_tangan'), $request->NIP);

        $lurah->save();

        return redirect()->route('admin.lurah')->with('success', 'Data kepala kelurahan Berhasil Diupdate');

    }

    
}
