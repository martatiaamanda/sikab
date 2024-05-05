<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class RiwayatBansonControllercd extends Controller
{
    public function index()
    {
        $histories = JenisSurat::paginate(10);
        return view('user.riwayat-bansos', compact('histories'));
    }
}
