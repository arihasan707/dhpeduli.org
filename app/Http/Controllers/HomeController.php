<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Program;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $program = Program::query()->orderBy('id', 'desc')->get();

        return view('home', compact('kategori', 'program'));
    }

    public function show(Program $program, Request $request)
    {
        $judulHeader = str::limit($program->judul, 34);
        $donasi = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->orderBy('id', 'desc')->paginate(5);
        $donatur = Donasi::where('program_id', $program->id)->where('status', '=', 'settlement')->get();
        $countDonasi = count($donatur);
        $terkumpul = $program->terkumpul / $program->kebutuhan * 100;

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

        return view('detail', compact('program', 'donasi', 'judulHeader', 'countDonasi', 'terkumpul'));
    }

    // public function like(Request $request)
    // {
    //     $id_donasi = Donasi::find($request->id);

    //     $like = new Donasi;
    //     $l
    // }
}
