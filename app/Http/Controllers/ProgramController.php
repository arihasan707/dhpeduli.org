<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query()) {
            $kategoriId = Kategori::where('nama', $request->query('kategori'))->first();
            $program = Program::query()->where('kategori_id', $kategoriId->id)->orderBy('id', 'desc')->get();
            return view('program', compact('program'));
        } else {
            $program = Program::query()->orderBy('id', 'desc')->get();
            return view('program', compact('program'));
        }
    }

    public function search()
    {
        $program = Program::search(request(['prog', 'kategori']))->latest()->get();
        return view('program', compact('program'));
    }
}
