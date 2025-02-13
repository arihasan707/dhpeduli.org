<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\ListBerita;
use Illuminate\Http\Request;
use App\Models\BeritaPenyaluran;
use App\Http\Controllers\Controller;

class BeritaPenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Berita & Penyaluran',
            'berita' => BeritaPenyaluran::orderBy('created_at', 'desc')->get(),
            'program' => Program::all(),
        ];

        return view('admin.berita_penyaluran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|unique:berita_penyalurans,program_id',
        ]);

        BeritaPenyaluran::create([
            'program_id' => $request->program_id
        ]);

        return redirect()->route('berita-penyaluran.index')->with('status', 'Berhasil program telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
