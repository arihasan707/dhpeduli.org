<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $donasi = '';

        if (Auth::check()) {
            $user = Auth::user();
            $donasi = Donasi::where('telp', $user->no_wa)->orderBy('created_at', 'desc')->get();
            if ($request->query()) {
                $success = Donasi::where('telp', $user->no_wa)->where('status', 'settlement')->orderBy('created_at', 'desc')->get();
                $expire = Donasi::where('telp', $user->no_wa)->where('status', 'expire')->orderBy('created_at', 'desc')->get();
            }

            $_empty = [];
            foreach ($donasi as $a) {
                $_empty[] = $a->status;
            }

            return view('donasi-saya', compact('donasi', 'success', 'expire', '_empty'));
        }


        return view('donasi-saya', compact('donasi'));
    }
}
