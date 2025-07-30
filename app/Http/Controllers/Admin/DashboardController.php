<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donasi;
use App\Models\User;
use App\Models\Program;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $data = [
            'title' => 'Dashboard',
            'totalProgram' => Program::all()->count(),
            'totalUser' => User::all()->count(),
            'totalDonasi' => Donasi::where('status', 'settlement')->get()->sum('amount'),
            'topDonasi' => Donasi::where('amount', '>', 500000)->where('status', 'settlement')->paginate(5),
            'donasiTerbaru' => Donasi::where('status', 'settlement')->orderBy('created_at', 'desc')->paginate(5)
        ];

        return view('admin.dashboard', $data);
    }
}
