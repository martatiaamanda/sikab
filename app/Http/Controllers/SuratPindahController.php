<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\surat;
use App\Models\SuratPindah;
use App\Models\UserDocumen;
use Illuminate\Http\Request;

class SuratPindahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.surat.pindah.create');
    }

    protected function uploadFile($field, $file, $surat_id,)
    {

        $file_name = time() . '-' . $surat_id . '-' . $field . '_' . $file->getClientOriginalName();
        $file->storeAs('public/surat', $file_name);

        return $file_name;
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
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'no_kk' => 'required',
            'alamat_asal' => 'required',
            'alamat_tujuan' => 'required',
            'desa_tujuan' => 'required',
            'kecamatan_tujuan' => 'required',
            'kabupaten_tujuan' => 'required',
            'provinsi_tujuan' => 'required',
            'alasan_pindah' => 'required',
            "kk" => [$kkRequired, 'file', 'mimes:pdf', 'max:2048'],
            "ktp" => [$ktpRequired, 'file', 'mimes:pdf', 'max:2048'],
        ], [
            'required' => ':attribute tidak boleh kosong'
        ]);

        // dd($request->all());

        $jenis_surat = JenisSurat::where('slug', 'surat-pindah')->first();

        $surat = surat::create([
            'user_id' => $user->id,
            'jenis_surat_id' => $jenis_surat->id,
        ]);

        $ktp = request()->file('kk') ? $this->uploadFile('kk', request()->file('kk'), $surat->id) : $userDocument->kk;
        $kk = request()->file('ktp') ? $this->uploadFile('ktp', request()->file('ktp'), $surat->id) : $userDocument->ktp;

        $surat_pindah = $surat->surat_pindah()->create([
            'jenis_surat_id' => $jenis_surat->id,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'perkawinan' => $request->perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'no_kk' => $request->no_kk,
            'alamat_asal' => $request->alamat_asal,
            'alamat_tujuan' => $request->alamat_tujuan,
            'desa_tujuan' => $request->desa_tujuan,
            'kecamatan_tujuan' => $request->kecamatan_tujuan,
            'kabupaten_tujuan' => $request->kabupaten_tujuan,
            'provinsi_tujuan' => $request->provinsi_tujuan,
            'alasan_pindah' => $request->alasan_pindah,

            'kk' => $kk,
            'ktp' => $ktp,
        ]);

        if ($request->has('subSuratPindah')) {
            $surat_pindah->sub_surat_pindah()->createMany(
                $request->subSuratPindah
            );
        }
        // $surat_pindah->sub_surat_pindah()->createMany(
        //     $request->subSuratPindah
        // );

        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil Dibuat');

        // dd($surat, $surat->surat_pindah, $surat->surat_pindah[0]->sub_surat_pindah);


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $surat = surat::where('id', $id)->first();

        if (!$surat) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        $surat_pindah = $surat->surat_pindah;

        return view('user.surat.pindah.show', compact('surat', 'surat_pindah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $surat = surat::where('id', $id)->first();

        if (!$surat) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        $surat_pindah = $surat->surat_pindah;

        return view('user.surat.pindah.edit', compact('surat', 'surat_pindah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $surat = surat::where('id', $id)->first();
        if (!$surat) {
            return redirect()->route('user.riwayat-surat')->with('error', 'Surat Tidak Ditemukan');
        }

        $surat->status = 'diproses';
        $surat->save();

        $surat_pindah = $surat->surat_pindah;

        $kk = request()->file('kk') ? $this->uploadFile('kk', request()->file('kk'), $surat->id) : $surat_pindah->kk;
        $ktp = request()->file('ktp') ? $this->uploadFile('ktp', request()->file('ktp'), $surat->id) : $surat_pindah->ktp;

        $surat_pindah->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'perkawinan' => $request->perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'no_kk' => $request->no_kk,
            'alamat_asal' => $request->alamat_asal,
            'alamat_tujuan' => $request->alamat_tujuan,
            'desa_tujuan' => $request->desa_tujuan,
            'kecamatan_tujuan' => $request->kecamatan_tujuan,
            'kabupaten_tujuan' => $request->kabupaten_tujuan,
            'provinsi_tujuan' => $request->provinsi_tujuan,
            'alasan_pindah' => $request->alasan_pindah,

            'kk' => $kk,
            'ktp' => $ktp,
        ]);

        $sub_surat_pindah = $surat_pindah->sub_surat_pindah;

        $requestIds = collect($request->subSuratPindah)->pluck('id')->filter()->all();

        $existingIds = $sub_surat_pindah->pluck('id')->all();

        $idsToDelete = array_diff($existingIds, $requestIds);
        if (!empty($idsToDelete)) {
            $surat_pindah->sub_surat_pindah()->whereIn('id', $idsToDelete)->delete();
        }

        foreach ($request->subSuratPindah as $subSuratPindah) {
            if (isset($subSuratPindah['id']) && in_array($subSuratPindah['id'], $existingIds)) {

                $sub_surat_pindah->where('id', $subSuratPindah['id'])->first()->update($subSuratPindah);
            } else {
                $surat_pindah->sub_surat_pindah()->create($subSuratPindah);
            }
        }

        // $sub_surat_pindah = $surat_pindah->sub_surat_pindah;

        // dd($request->all(), $surat_pindah, $surat_pindah->sub_surat_pindah);


        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratPindah $suratPindah)
    {
        //
    }
}
