<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            return view('akun', compact('user'));
        } else {
            return view('akun');
        }
    }
}
