<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


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
        // $request->validate([
        //     'judul' => 'required',
        //     'kategori' => 'required',
        //     'kebutuhan' => 'required',
        //     'tipe_waktu' => 'required',
        //     'desc_singkat' => 'required',
        //     'img' => 'required|mimes:png,jpg',
        //     'detail_program' => 'required'
        // ]);


        if ($request->hasFile('img')) {
            $upload = $request->file('img');

            //resize gambar
            $image = Image::read($upload)->cover(545, 315);

            $imageName = time() . '.' . $upload->getClientOriginalExtension();
            $thumbImage =  $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 90);

            Storage::disk('upload')->put($imageName, $thumbImage);
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
            'img' => $imageName,
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
            'img' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG',
            'detail_program' => 'required'
        ]);

        $program = Program::find($id);

        if ($request->img) {
            $file_path = public_path() . '/upload/';
            if ($program->img != '' && $program->img != NULL) {
                $img_old = $file_path . $program->img;
                unlink($img_old);
            }

            $file = $request->img;
            $image = Image::read($file)->cover(545, 315);
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $thumbImage =  $image->encodeByExtension($file->getClientOriginalExtension(), quality: 90);

            Storage::disk('upload')->put($imageName, $thumbImage);

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
                'img' => $imageName,
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