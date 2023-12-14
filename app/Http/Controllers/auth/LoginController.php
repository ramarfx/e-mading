<?php

namespace App\Http\Controllers\auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if ($request->has('nis')) {
                $request->validate([
                    'nis' => ['numeric'],
                ]);

                $siswa = Siswa::where('nis', $request->nis)->first();

                if (!$siswa) {
                    return back()
                    ->withErrors(['nis' => 'The nis field do not match our records.'])
                    ->onlyInput('email', 'nis');
                }

                $request->session()->regenerate();
                return redirect()->intended(route('home'));
            }

            if ($request->has('nip')) {
                $request->validate([
                    'nis' => ['numeric'],
                ]);

                $guru = Guru::where('nip', $request->nip)->first();

                if (!$guru) {
                    return back()
                    ->withErrors(['nip' => 'The nip field do not match our records.'])
                    ->onlyInput('email', 'nip');
                }

                $request->session()->regenerate();
                return redirect()->intended(route('home'));
            }

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()
        ->withErrors(['email' => 'The provided credentials do not match our records.'])
        ->onlyInput('email');
    }
}
