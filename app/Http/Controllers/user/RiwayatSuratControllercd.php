<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\surat;
use Illuminate\Http\Request;

class RiwayatSuratControllercd extends Controller
{
    public function index()
    {
        $histories = surat::where('user_id', auth()->user()->id)->paginate(10);

        // dd ($surats[0]->input_value);
        // $histories = JenisSurat::paginate(10);
        return view('user.riwayat-surat', compact('histories'));
    }
}
