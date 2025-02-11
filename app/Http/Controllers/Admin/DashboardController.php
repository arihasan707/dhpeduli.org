<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donasi;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $totalProgram = Program::all()->count();
        $totalUser = User::all()->count();
        $donasiSuccess = Donasi::query()->where('status', 'settlement')->get();
        $totalDonasi = $donasiSuccess->sum('amount');
        $topDonasi = Donasi::where('amount', '>', 500000)->paginate(5);
        $donasiTerbaru = Donasi::where('status','settlement')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.dashboard', compact('totalProgram','totalUser','donasiTerbaru', 'topDonasi','totalDonasi'));
    }
}
