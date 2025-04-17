<?php

namespace App\Http\Controllers\Admin\Exports;

use App\Exports\DonasiExcel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DonasiExport extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        // return dd($start);

        return Excel::download(new DonasiExcel($start, $end), 'donasi-' . now() . '.xlsx');
    }
}
