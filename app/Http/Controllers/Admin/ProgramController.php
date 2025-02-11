<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Program';
        $data = Program::orderBy('created_at', 'desc')->get();
        return view('admin.program.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Program';
        $dataKategori = Kategori::all();
        return view('admin.program.create', compact('title', 'dataKategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'kebutuhan' => 'required',
            'tipe_waktu' => 'required',
            'desc_singkat' => 'required',
            'img' => 'required|mimes:png,jpg',
            'detail_program' => 'required'
        ]);

        $file_path = public_path() . '/upload/';

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($file_path, $file_name);
        }

        Program::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'desc_singkat' => $request->desc_singkat,
            'detail_program' => $request->detail_program,
            'kategori_id' => $request->kategori,
            'kebutuhan' => str::replace(".", "", $request->kebutuhan),
            'sisa' => str::replace(".", "", $request->kebutuhan),
            'tipe_waktu' => $request->tipe_waktu,
            'waktu' => $request->waktu,
            'img' => $file_name,
            'status' => 'publish'
        ]);

        return redirect()->route('program.index')->with('status', 'Berhasil program baru telah ditambahkan');
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
        $title = 'Edit Program';
        $dataKategori = Kategori::all();
        $dataProgram = Program::find($id);
        return view('admin.program.edit', compact('dataProgram', 'title', 'dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'kebutuhan' => 'required',
            'tipe_waktu' => 'required',
            'desc_singkat' => 'required',
            'img' => 'mimes:png,jpg',
            'detail_program' => 'required'
        ]);

        $program = Program::find($id);

        if ($request->img != NULL) {
            $file_path = public_path() . '/upload/';
            if ($program->img != '' && $program->img != NULL) {
                $img_old = $file_path . $program->img;
                unlink($img_old);
            }
            $file = $request->img;
            $fileName = time() . $file->getClientOriginalName();
            $file->move($file_path, $fileName);

            if ($request->tipe_waktu == '0') {
                $waktu = Null;
            } else {
                $waktu = $request->waktu;
            }
            
            dd($fileName);

            $program->update([
                'judul' => $request->judul,
                'desc_singkat' => $request->desc_singkat,
                'detail_program' => $request->detail_program,
                'kategori' => $request->kategori_id,
                'kebutuhan' => str::replace(".", "", $request->kebutuhan),
                'tipe_waktu' => $request->tipe_waktu,
                'waktu' => $waktu,
                'img' => $fileName,
            ]);
        } else {

            if ($request->tipe_waktu == '0') {
                $waktu = Null;
            } else {
                $waktu = $request->waktu;
            }

            $program->update([
                'judul' => $request->judul,
                'desc_singkat' => $request->desc_singkat,
                'detail_program' => $request->detail_program,
                'kategori' => $request->kategori_id,
                'kebutuhan' => str::replace(".", "", $request->kebutuhan),
                'tipe_waktu' => $request->tipe_waktu,
                'waktu' => $waktu,
            ]);
        }

        return redirect()->route('program.index')->with('status', 'Berhasil program telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Program::find($id);
        $file_path = public_path('upload/' . $data->img);

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        Program::destroy($id);

        return redirect()->route('program.index')->with('status', "Berhasil program telah dihapus");
    }
}
