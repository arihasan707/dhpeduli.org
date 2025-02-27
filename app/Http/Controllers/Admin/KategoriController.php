<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kategori';
        $data = Kategori::all();
        return view('admin.kategori', compact('data', 'title'));
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
            'nama' => 'required|unique:kategoris,nama',
            'gambar' => 'required|mimes:png,jpg'
        ]);

        if ($request->hasFile('gambar')) {
            $upload = $request->file('gambar');
            //resize gambar
            $image = Image::read($upload)->cover(600, 450);

            $imageName = time() . '.' . $upload->getClientOriginalExtension();
            $thumbImage =  $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 20);

            Storage::disk('upload')->put($imageName, $thumbImage);
        }

        Kategori::create([
            'nama' => $request->nama,
            'img' => $imageName,
        ]);

        return redirect()->route('kategori.index')->with('status', 'Berhasil Kategori baru telah ditambahkan');
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
        $data = Kategori::find($id);
        $file_path = public_path('upload/' . $data->img);

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        Kategori::destroy($id);

        return redirect()->route('kategori.index')->with('status', "Berhasil kategori telah dihapus");
    }
}