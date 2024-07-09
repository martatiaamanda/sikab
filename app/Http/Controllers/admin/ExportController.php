<?php

namespace App\Http\Controllers\admin;

use App\Exports\DataBansos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    
    public function index()
    {
        return Excel::download(new DataBansos, 'data-bansos.xlsx');
    }
}
