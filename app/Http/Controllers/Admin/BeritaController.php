<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BeritaUmum;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Berita',
            'berita' => BeritaUmum::orderBy('created_at', 'desc')->get()
        ];

        return view('admin.berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Berita';
        $dataProg = Program::all();
        return view('admin.berita.create', compact('title', 'dataProg'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $upload = $request->file('foto');

            //resize gambar
            $image = Image::read($upload)->cover(545, 315);

            $imageName = time() . '.' . $upload->getClientOriginalExtension();
            $thumbImage =  $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 90);

            Storage::disk('upload-berita')->put($imageName, $thumbImage);
        }

        BeritaUmum::create([
            'prog_id' => $request->prog,
            'judul' => $request->judul,
            'foto' => $imageName,
            'slug' => Str::slug($request->judul),
            'cta' => $request->cta,
            'isi' => $request->isi_berita,
        ]);
        return redirect()->route('berita.index')->with('status', 'Berhasil berita baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
