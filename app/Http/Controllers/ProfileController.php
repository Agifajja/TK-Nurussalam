<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'Kepala Sekolah') {
            return view('kepsek.profile', compact('user'));
        }

        return view('guru.profile', compact('user'));
    }
}
