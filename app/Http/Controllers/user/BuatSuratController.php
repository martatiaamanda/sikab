<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\InputField;
use App\Models\JenisSurat;
use App\Models\NomorSurat;
use App\Models\surat;
use Illuminate\Http\Request;
use Laravel\Prompts\Key;
use Termwind\Components\Dd;

class BuatSuratController extends Controller
{
    public function index()
    {
        $mail_types = JenisSurat::all();

        return view('user.buat-surat', compact('mail_types'));
    }

    public function create($slug) {

        // if($slug !== 'surat-kependudukan') {
        //     return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        // }
        $jenis_surat = JenisSurat::where('slug', $slug)->first();
        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }

        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();

        return view('user.surat.create', compact('data_types', 'jenis_surat'));
    }

    protected function uploadFile($Key, $file, $surat_id, ) {

        $field = InputField::where('id', $Key)->select('name')->first();
        $file_name = time() . '-' . $surat_id . '-' . $field->name . '_' . $file->getClientOriginalName();
        $file->storeAs('public/bansos', $file_name);

        return $file_name;
    }




    public function store(Request $request, $slug) {

        // if($slug !== 'surat-kependudukan') {
        //     return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        // }
        // get jenis surat
        $jenis_surat = JenisSurat::where('slug', $slug)->first();

        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }
        // variable for validate request and and get request input
        $validate_scema = [];
        $validate_response_scema = [];
        $request_input = [];

        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();

        // loop data types and input fields for validate request and get request input
        foreach($data_types as $data_type) {
            $fields = $data_type->input_fields;
            foreach($fields as $field) {
                $validate_scema[$field->name] = [$field->validate];
                $validate_response_scema[$field->name.'.'.$field->validate] = $field->name . ' Harus diisi';
                if($field->type == 'file') {
                    $request_input[$field->id] = $request->file($field->name);
                } else {
                    $request_input[$field->id] = $request->input($field->name);
                }
            }
        }
        // validate request
        $request->validate($validate_scema, $validate_response_scema);

        $user = auth()->user();

        $nomor_surat = NomorSurat::first();
        // create surat
        $surat = surat::create([
            'user_id' => $user->id,
            'jenis_surat_id' => $jenis_surat->id,
        ]);

        $surat->nomor_surat = $nomor_surat->awal .' '. $surat->id . $nomor_surat->akhir . '/'. $nomor_surat->tahun;

        // dd($surat->nomor_surat);
        $surat->save();
        // create input value for surat
        foreach($request_input as $key => $value) {
            if(is_uploaded_file($value)) {
                $file_name = $this->uploadFile($key, $value, $surat->id);
                $surat->input_value()->create([
                    'input_field_id' => $key,
                    'value' => $file_name
                ]);
            } else {
                $surat->input_value()->create([
                        'input_field_id' => $key,
                        'value' => $value
                    ]);
            }
        }

        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil Disimpan');
    }


    public function update(Request $request, $id)
    {
        // get surat
        $surat = surat::where('id', $id)->first();
        $jenis_surat = JenisSurat::where('id', $surat->jenis_surat_id)->first();

        $surat->status = 'diproses';
        $surat->save();

        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }
        $request_input = [];

        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();

        // loop data types and input fields for validate request and get request input
        foreach($data_types as $data_type) {
            $fields = $data_type->input_fields;
            foreach($fields as $field) {
                if($field->type == 'file') {
                    $request_input[$field->id] = $request->file($field->name);
                } else {
                    $request_input[$field->id] = $request->input($field->name);
                }
            }
        }


        // create input value for surat
        foreach($request_input as $key => $value) {
            if(is_uploaded_file($value)) {
                $file_name = $this->uploadFile($key, $value, $surat->id);
                $input_value = $surat->input_value()->where('input_field_id', $key)->first();
                $input_value->value = $file_name;
                $input_value->save();
            } else {
                $input_value = $surat->input_value()->where('input_field_id', $key)->first();
                $input_value->value = $value;
                $input_value->save();
            }
        }

        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil update');
    }
}
