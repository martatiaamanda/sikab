<?php

namespace App\Http\Controllers\admin;

use App\Exports\DataBansos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Validasi input tanggal jika diperlukan
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $name = 'data-bansos-' . $startDate . '-' . $endDate . '.xlsx';

        return Excel::download(new DataBansos($startDate, $endDate), $name);
    }
}
