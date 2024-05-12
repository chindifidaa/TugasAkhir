<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('auth.index', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role->name == 'Customer') {
                return redirect()->route('home');
            } else {
                return redirect()->route('apps.dashboard');
            }
        } else {
            return redirect()->route('auth')->with('error', 'Email atau password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home')->with('success', 'Anda berhasil keluar.');
    }
}
