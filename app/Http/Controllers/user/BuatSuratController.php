<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\JenisSurat;
use App\Models\surat;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class BuatSuratController extends Controller
{
    public function index()
    {
        $mail_types = JenisSurat::all();

        return view('user.buat-surat', compact('mail_types'));
    }

    public function create($slug) {

        if($slug !== 'surat-kependudukan') {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }
        $jenis_surat = JenisSurat::where('slug', $slug)->first();
        // $mail_types = JenisSurat::all();
        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }

        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();
        // dd($data_types[0]->input_fields);

        return view('user.surat.create', compact('data_types', 'jenis_surat'));
    }

    public function store(Request $request, $slug) {

        if($slug !== 'surat-kependudukan') {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }
        $jenis_surat = JenisSurat::where('slug', $slug)->first();

        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }

        $validate_scema = [];
        $validate_response_scema = [];
        $request_input = [];
        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();
        foreach($data_types as $data_type) {
            $fields = $data_type->input_fields;
            foreach($fields as $field) {
                $validate_scema[$field->name] = [$field->validate];
                $validate_response_scema[$field->name.'.'.$field->validate] = $field->name . ' Harus diisi';
                $request_input[$field->id] = $request->input($field->name);
            }
        }
        $request->validate($validate_scema, $validate_response_scema);;

        $user = auth()->user();
        $surat = surat::create([
            'user_id' => $user->id,
            'jenis_surat_id' => $jenis_surat->id,
        ]);
        foreach($request_input as $key => $value) {
            $surat->input_value()->create([
                'input_field_id' => $key,
                'value' => $value
            ]);
        }

        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil Disimpan');

    }
}
