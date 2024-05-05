<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class BuatSuratController extends Controller
{
    public function index()
    {
        $mail_types = JenisSurat::all();

        return view('user.buat-surat', compact('mail_types'));
    }

    public function create($slug) {
        $mail_types = JenisSurat::all();
        return view('user.buat-surat', compact('mail_types', 'slug'));
        // $mail_type = JenisSurat::where('slug', $slug)->first();
    }
}
