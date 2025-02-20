<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\ListBerita;
use Illuminate\Http\Request;
use App\Models\BeritaPenyaluran;
use App\Http\Controllers\Controller;

class ListBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
            'judul' => 'required',
            'ket_detail' => 'required',
        ]);

        ListBerita::create([
            'berita_penyaluran_id' => $request->id,
            'judul' => $request->judul,
            'ket' => $request->ket_detail
        ]);

        return redirect()->route('list-berita.show', [$request->id, $request->program_id])->with('status', 'Berhasil berita telah dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $program_id)
    {
        $data = [
            'title' => 'Berita Campaign',
            'program' => Program::where('id', $program_id)->first(),
            'list_berita' => ListBerita::where('berita_penyaluran_id', $id)->orderBy('created_at', 'desc')->get(),
            'id' => $id,
            'program_id' => $program_id
        ];

        return view('admin.berita_penyaluran.show', $data);
    }

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
