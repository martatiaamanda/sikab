<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\InputField;
use App\Models\JenisSurat;
use App\Models\NomorSurat;
use App\Models\surat;
use App\Models\UserDocumen;
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
        $file->storeAs('public/surat', $file_name);

        return $file_name;
    }




    public function store(Request $request, $slug) {

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
        $user_document = UserDocumen::where('user_id', auth()->id())->first();

        // loop data types and input fields for validate request and get request input
        foreach($data_types as $data_type) {
            $fields = $data_type->input_fields;
            foreach($fields as $field) {
                // $validate_scema[$field->name] = [$field->validate];
                // $validate_response_scema[$field->name.'.'.$field->validate] = $field->name . ' Harus diisi';
                // if($field->type == 'file') {
                //     $request_input[$field->id] = $request->file($field->name);
                // } else {
                //     $request_input[$field->id] = $request->input($field->name);
                // }
                if (!empty($field->validate)) {
                    $validate_schema[$field->name] = [$field->validate];
                    $validate_response_schema[$field->name . '.' . $field->validate] = $field->name . ' Harus diisi';
                }
    
                if ($field->type == 'file') {
                    $file = $request->file($field->name);
                    $document_field_empty = true;
    
                    if (!$file && $user_document) {
                        if ($field->name == 'ktp' && $user_document->ktp) {
                            $file = $user_document->ktp;
                            $document_field_empty = false;
                        } elseif ($field->name == 'kk' && $user_document->kk) {
                            $file = $user_document->kk;
                            $document_field_empty = false;
                        }
                    }
    
                    // If the document field is empty and no file is uploaded, add a required validation rule
                    if ($document_field_empty) {
                        $validate_schema[$field->name][] = 'required';
                    }
    
                    $request_input[$field->id] = $file;
                } else {
                    $request_input[$field->id] = $request->input($field->name);
                }
            }
        }
        // validate request
        $request->validate($validate_scema, $validate_response_scema);

        $user = auth()->user();

        // create surat
        $surat = surat::create([
            'user_id' => $user->id,
            'jenis_surat_id' => $jenis_surat->id,
        ]);

        

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


    public function update(Request $request, $id) {
        // get surat by id
        $surat = Surat::find($id);
    
        if (!$surat) {
            return redirect()->back()->with('error', 'Surat Tidak Ditemukan');
        }
    
        // get jenis surat
        $jenis_surat = JenisSurat::find($surat->jenis_surat_id);
    
        if (!$jenis_surat) {
            return redirect()->back()->with('error', 'Jenis Surat Tidak Ditemukan');
        }
    
        // variable for validate request and and get request input
        $validate_schema = [];
        $validate_response_schema = [];
        $request_input = [];
    
        $data_types = DataType::with('input_fields')->where('jenis_surat_id', $jenis_surat->id)->get();
    
        // Get user document
        $user_document = UserDocumen::where('user_id', auth()->id())->first();
    
        // loop data types and input fields for validate request and get request input
        foreach($data_types as $data_type) {
            $fields = $data_type->input_fields;
            foreach($fields as $field) {
                // Check if validate attribute is set
                if (!empty($field->validate)) {
                    $validate_schema[$field->name] = [$field->validate];
                    $validate_response_schema[$field->name . '.' . $field->validate] = $field->name . ' Harus diisi';
                }
    
                if ($field->type == 'file') {
                    $file = $request->file($field->name);
                    $document_field_empty = true;
    
                    if (!$file && $user_document) {
                        if ($field->name == 'ktp' && $user_document->ktp) {
                            $file = $user_document->ktp;
                            $document_field_empty = false;
                        } elseif ($field->name == 'kk' && $user_document->kk) {
                            $file = $user_document->kk;
                            $document_field_empty = false;
                        }
                    }
    
                    // If the document field is empty and no file is uploaded, add a required validation rule
                    if ($document_field_empty) {
                        $validate_schema[$field->name][] = 'required';
                    }
    
                    $request_input[$field->id] = $file;
                } else {
                    $request_input[$field->id] = $request->input($field->name);
                }
            }
        }
    
        // validate request
        $request->validate($validate_schema, $validate_response_schema);
    
        $user = auth()->user();
    
        // update surat
        $surat->update([
            'user_id' => $user->id,
            'jenis_surat_id' => $jenis_surat->id,
        ]);
    
        // update input value for surat
        foreach($request_input as $key => $value) {
            $input_value = $surat->input_value()->where('input_field_id', $key)->first();
    
            if (is_uploaded_file($value)) {
                $file_name = $this->uploadFile($key, $value, $surat->id);
                if ($input_value) {
                    $input_value->update([
                        'value' => $file_name
                    ]);
                } else {
                    $surat->input_value()->create([
                        'input_field_id' => $key,
                        'value' => $file_name
                    ]);
                }
            } else {
                if ($input_value) {
                    $input_value->update([
                        'value' => $value
                    ]);
                } else {
                    $surat->input_value()->create([
                        'input_field_id' => $key,
                        'value' => $value
                    ]);
                }
            }
        }
    
        return redirect()->route('user.riwayat-surat')->with('success', 'Surat Berhasil Diperbarui');
    }
    
}
