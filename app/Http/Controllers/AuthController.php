<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {

            $user = Auth::guard('web')->user();

            // ===== ROLE BASED REDIRECT =====
            if ($user->role === 'Kepala Sekolah') {
                return redirect()->route('kepsek.dashboard');
            }

            // default Guru
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Password atau Username tidak sesuai');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login.form');
    }
}
