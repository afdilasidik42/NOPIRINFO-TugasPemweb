<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. TAMPILKAN FORM REGISTER
    public function showRegister()
    {
        return view('auth.register');
    }

    // 2. PROSES REGISTER USER BARU
    public function processRegister(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ]);

        // Bikin user baru di database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Enkripsi password
        ]);

        // Langsung redirect ke login
        return redirect()->route('login')->with('success', 'Akun jadi! Silakan login, Bray.');
    }

    // 3. TAMPILKAN FORM LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // 4. PROSES LOGIN (JANTUNGNYA AUTH)
    public function processLogin(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek apakah email & password cocok?
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Security: Buat session baru biar gak di-hack
            return redirect()->intended('/'); // Lempar ke Dashboard
        }

        // Kalau gagal login
        return back()->with('error', 'Login gagal! Email atau password salah.');
    }

    // 5. LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}