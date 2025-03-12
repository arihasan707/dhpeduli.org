<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class BannerController extends Controller
{
    protected $manager;
    public function __construct()
    {
        $this->manager = new ImageManager(
            new Driver()
        );
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Banner';
        $banner = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.banner.index', compact('title', 'banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Banner';
        return view('admin.banner.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('img')) {
            $upload = $request->file('img');

            //resize gambar
            $image = $this->manager->read($upload)->cover(545, 315);

            $imageName = time() . '.' . $upload->getClientOriginalExtension();
            $thumbImage =  $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 90);

            Storage::disk('upload-banner')->put($imageName, $thumbImage);
        }

        Banner::create([
            'link' => $request->link,
            'img' => $imageName,
        ]);
        return redirect()->route('banner.index')->with('status', 'Berhasil banner baru telah ditambahkan');
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
    { {
            $data = Banner::find($id);

            Storage::disk('upload-banner')->delete($data->img);

            Banner::destroy($id);

            return redirect()->route('banner.index')->with('status', "Berhasil banner telah dihapus");
        }
    }
}
