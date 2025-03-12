<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BeritaPenyaluran;
use App\Models\Donasi;
use App\Models\Program;
use App\Models\Kategori;
use App\Models\ListBerita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $program = Program::orderBy('id', 'desc')->paginate(5);
        $banner = Banner::orderBy('created_at', 'desc')->get();

        return view('home', compact('kategori', 'program', 'banner'));
    }

    public function show(Program $program, Request $request)
    {
        $judulHeader = str::limit($program->judul, 34);
        $donasi = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->orderBy('id', 'desc')->paginate(5);
        $donatur = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->get();
        $countDonasi = count($donatur);
        $terkumpul = $program->terkumpul / $program->kebutuhan * 100;
        $data = BeritaPenyaluran::where('program_id', $program->id)->first();

        $berita = [];

        if ($data === null) {
            $berita = false;
        } else {
            $berita = ListBerita::where('berita_penyaluran_id', $data->id)->first();
            if ($berita == false) {
                $berita = false;
            } else {
                $berita = ListBerita::where('berita_penyaluran_id', $data->id)->orderBy('created_at', 'desc')->first();
            }
        }


        if ($request->query()) {
            switch ($request->query('filter')) {
                case 'latest':
                    $donatur = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->orderBy('id', 'desc')->get();
                    $countDonasi = count($donatur);
                    return view('donatur', compact('donatur', 'countDonasi', 'program'));
                    break;

                case 'doa':
                    $donatur = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->where('pesan', '!=', NULL)->orderBy('id', 'desc')->get();
                    $countDonasi = count($donatur);
                    return view('donatur', compact('donatur', 'countDonasi', 'program'));
                    break;

                default:
                    $donatur = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->orderBy('amount', 'desc')->get();
                    $countDonasi = count($donatur);
                    return view('donatur', compact('donatur', 'countDonasi', 'program'));
                    break;
            }
        }

        return view('detail', compact('program', 'donasi', 'judulHeader', 'countDonasi', 'terkumpul', 'berita'));
    }

    public function news(Program $program) {}
}
