<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function index()
    {
        return view('masuk.index', [
            'title' => 'Masuk',
            'aktif' => 'masuk'
        ]);
    }

    public function auth(Request $request)
    {
        $kredensi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($kredensi)) {
            $request->session()->regenerate();
            return redirect()->intended('dasbor');
        }

        return back()->with('masukGagal', 'Email atau password Anda salah!');
        
        dd('berhasil masuk');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk')->with('keluar', 'Terimakasih, Anda telah keluar.');
    }
}
