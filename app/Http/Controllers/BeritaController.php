<?php

namespace App\Http\Controllers;

use App\Models\BeritaUmum;
use Illuminate\Http\Request;


class BeritaController extends Controller
{
    public function index(Request $request, BeritaUmum $berita)
    {
        if ($berita->slug) {
            return view('detail-berita', compact('berita'));
        }

        $berita = BeritaUmum::with('Program')->latest()->get();
        return view('berita', compact('berita'));
    }
}
