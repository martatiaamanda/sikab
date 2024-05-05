<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class RiwayatSuratControllercd extends Controller
{
    public function index()
    {
        $mail_types = JenisSurat::paginate(10);
        return view('user.riwayat-surat', compact('mail_types'));
    }
}
