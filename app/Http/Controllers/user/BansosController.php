<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use Illuminate\Http\Request;
use Laravel\Prompts\Key;
use Termwind\Components\Dd;

class BansosController extends Controller
{

    protected function uploadFile($field, $file, $bansos_id, ) {
        $file_name = time() . '-' . $bansos_id . '-' . $field . '_' . $file->getClientOriginalName();
        $file->storeAs('public/surat', $file_name);

        return $file_name;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = Bansos::where('user_id', auth()->user()->id)->orderByDesc('id')->paginate(10);

        return view('user.riwayat-bansos', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.basos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'nama_ibu' => 'required',
            'umur_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'nama_ayah' => 'required',
            'umur_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'kk' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'sktm' => 'required|file|mimes:pdf|max:2048',
        ],[
            'nama.required' => 'Nama Lengkap Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',
            'nama_ibu.required' => 'Nama Ibu Wajib Diisi',
            'umur_ibu.required' => 'Umur Ibu Wajib Diisi',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu Wajib Diisi',
            'alamat_ibu.required' => 'Alamat Ibu Wajib Diisi',
            'nama_ayah.required' => 'Nama Ayah Wajib Diisi',
            'umur_ayah.required' => 'Umur Ayah Wajib Diisi',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah Wajib Diisi',
            'alamat_ayah.required' => 'Alamat Ayah Wajib Diisi',
            'kk.required' => 'KK Wajib Diisi',
            'kk.file' => 'KK Harus Berupa File',
            'kk.mimes' => 'KK Harus Berupa File PDF',
            'kk.max' => 'KK Maksimal 2MB',
            'ktp.required' => 'KTP Wajib Diisi',
            'ktp.file' => 'KTP Harus Berupa File',
            'ktp.mimes' => 'KTP Harus Berupa File PDF',
            'ktp.max' => 'KTP Maksimal 2MB',
            'sktm.required' => 'SKTM Wajib Diisi',
            'sktm.file' => 'SKTM Harus Berupa File',
            'sktm.mimes' => 'SKTM Harus Berupa File PDF',
            'sktm.max' => 'SKTM Maksimal 2MB',
        ] );
        $bansos = new Bansos();
        $bansos->user_id = auth()->user()->id;

        $bansos->save();
        $bansos->data_bansos()->create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ibu' => $request->nama_ibu,
            'umur_ibu' => $request->umur_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'nama_ayah' => $request->nama_ayah,
            'umur_ayah' => $request->umur_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'kk' => $this->uploadFile('kk', $request->file('kk'), $bansos->id),
            'ktp' => $this->uploadFile('ktp', $request->file('ktp'), $bansos->id),
            'sktm' => $this->uploadFile('sktm', $request->file('sktm'), $bansos->id),
        ]);

        return redirect()->route('user.riwayat-bansos')->with('success', 'Bansos Berhasil Diajukan');



    }

    /**
     * Display the specified resource.
     */
    public function show(Bansos $bansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bansos $bansos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bansos $bansos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bansos $bansos)
    {
        //
    }
}
