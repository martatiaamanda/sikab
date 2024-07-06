<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\surat;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $jenisSurat = JenisSurat::all();

        return view('admin.dashoard', compact('jenisSurat'));
    }
}
