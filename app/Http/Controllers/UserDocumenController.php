<?php

namespace App\Http\Controllers;

use App\Models\UserDocumen;
use Illuminate\Http\Request;

class UserDocumenController extends Controller
{
    //
    protected function uploadFile($user_id, $file, $field) {
        $file_name = time() . '-' . $user_id . '-' . $field . '-' . $file->getClientOriginalName();

        $file->storeAs('public/surat', $file_name);

        return $file_name;
    }

    public function store(Request $request) {
         $user = auth()->user();

        $request->validate([
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'kk' => 'required|file|mimes:pdf|max:2048',
        ], [
            'ktp.required' => 'KTP wajib diisi',
            'ktp.file' => 'KTP harus berupa file',
            'ktp.mimes' => 'KTP harus berupa file pdf',
            'ktp.max' => 'KTP maksimal 2MB',
            'kk.required' => 'KK wajib diisi',
            'kk.file' => 'KK harus berupa file',
            'kk.mimes' => 'KK harus berupa file pdf',
            'kk.max' => 'KK maksimal 2MB',
        ]);

        UserDocumen::create([
            'user_id' => $user->id,
            'ktp' => $this->uploadFile($user->id, $request->file('ktp'), 'ktp'),
            'kk' => $this->uploadFile($user->id, $request->file('kk'), 'kk'),
        ]);

        return redirect()->route('profile')->with('success', 'Dokumen berhasil diupload');
    }

    public function update(Request $request) {
        $user = auth()->user();

        $request->validate([
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'kk' => 'required|file|mimes:pdf|max:2048',
        ]);

        $documen = UserDocumen::where('user_id', $user->id)->first();

        $documen->update([
            'ktp' => $this->uploadFile($user->id, $request->file('ktp'), 'ktp'),
            'kk' => $this->uploadFile($user->id, $request->file('kk'), 'kk'),
        ]);

        return redirect()->route('profile')->with('success', 'Dokumen berhasil diupdate');
    }
}
