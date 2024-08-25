<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use App\Models\UserDocumen;
use Illuminate\Http\Request;
use Laravel\Prompts\Key;
use Termwind\Components\Dd;

class BansosController extends Controller
{

    protected function uploadFile($field, $file, $bansos_id,)
    {

        $file_name = time() . '-' . $bansos_id . '-' . $field . '_' . $file->getClientOriginalName();
        $file->storeAs('public/surat', $file_name);

        return $file_name;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = Bansos::where('user_id', auth()->user()->id)->orderByDesc('id')->get();

        return view('user.riwayat-bansos', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.bansos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $user = auth()->user();
        $userDocument = UserDocumen::where('user_id', auth()->id())->first();

        // Determine required fields based on the existence of userDocument kk and ktp
        $kkRequired = !$userDocument || !$userDocument->kk ? 'required' : 'nullable';
        $ktpRequired = !$userDocument || !$userDocument->ktp ? 'required' : 'nullable';

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kk' => [$kkRequired, 'file', 'mimes:pdf', 'max:2048'],
            'ktp' => [$ktpRequired, 'file', 'mimes:pdf', 'max:2048'],
            'sktm' => 'required|file|mimes:pdf|max:2048',
            'pengantar_rt' => 'required|file|mimes:pdf|max:2048'
        ], [
            'nama.required' => 'Nama Lengkap Wajib Diisi',
            'nik.required' => 'NIK Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',
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
            'pengantar_rt.required' => 'Pengantar RT Wajib Diisi',
            'pengantar_rt.file' => 'Pengantar RT Harus Berupa File',
            'pengantar_rt.mimes' => 'Pengantar RT Harus Berupa File PDF',
            'pengantar_rt.max' => 'Pengantar RT Maksimal 2MB',
        ]);
        $bansos = new Bansos();
        $bansos->user_id = auth()->user()->id;
        $bansos->tanggal_bansos = now();


        $ktp = request()->file('kk') ? $this->uploadFile('kk', request()->file('kk'), $bansos->id) : $userDocument->kk;
        $kk = request()->file('ktp') ? $this->uploadFile('ktp', request()->file('ktp'), $bansos->id) : $userDocument->ktp;


        $bansos->save();
        $bansos->data_bansos()->create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kk' => $kk,
            'ktp' => $ktp,
            'sktm' => $this->uploadFile('sktm', $request->file('sktm'), $bansos->id),
            'pengantar_rt' => $this->uploadFile('pengantar_rt', $request->file('pengantar_rt'), $bansos->id),
        ]);

        return redirect()->route('user.riwayat-bansos')->with('success', 'Bansos Berhasil Diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $bansos = Bansos::findOrFail($id);

        return view('user.bansos.show', compact('bansos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $bansos = Bansos::findOrFail($id);

        // return $bansos;

        return view('user.bansos.edit', compact('bansos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kk' => 'file|mimes:pdf|max:2048',
            'ktp' => 'file|mimes:pdf|max:2048',
            'sktm' => 'file|mimes:pdf|max:2048',
            'pengantar_rt' => 'file|mimes:pdf|max:2048'
        ], [
            'nama.required' => 'Nama Lengkap Wajib Diisi',
            'nik.required' => 'NIK Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',
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
            'pengantar_rt.required' => 'Pengantar RT Wajib Diisi',
            'pengantar_rt.file' => 'Pengantar RT Harus Berupa File',
            'pengantar_rt.mimes' => 'Pengantar RT Harus Berupa File PDF',
            'pengantar_rt.max' => 'Pengantar RT Maksimal 2MB',
        ]);

        $bansos = Bansos::findOrFail($id);
        $bansos->status = 'diproses';
        $bansos->save();

        // dd(request()->file('kk') ? $this->uploadFile('kk', $request->file('kk'), $bansos->id) : $bansos->data_bansos->kk,);

        // dd($bansos->data_bansos->kk, $request->file('kk'), request()->file('kk'));

        $bansos->data_bansos()->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kk' => request()->file('kk') ? $this->uploadFile('kk', $request->file('kk'), $bansos->id) : $bansos->data_bansos->kk,
            'ktp' => request()->file('ktp') ? $this->uploadFile('ktp', $request->file('ktp'), $bansos->id) : $bansos->data_bansos->ktp,
            'sktm' => request()->file('sktm') ? $this->uploadFile('sktm', $request->file('sktm'), $bansos->id) : $bansos->data_bansos->sktm,
            'pengantar_rt' => request()->file('pengantar_rt') ? $this->uploadFile('pengantar_rt', $request->file('pengantar_rt'), $bansos->id) : $bansos->data_bansos->pengantar_rt,
        ]);

        return redirect()->route('user.riwayat-bansos.show', [$id])->with('success', 'Bansos Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $bansos = Bansos::findOrFail($id);
        $bansos->delete();

        return redirect()->route('user.riwayat-bansos')->with('success', 'Bansos Berhasil Dihapus');
    }
}
