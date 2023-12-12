<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

// use Illuminate\Validation\Validator::validateNumber();

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $datas = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email:dns', 'max:255'],
            'nis'      => ['required', 'numeric'],
            'nip'      => ['required', 'numeric'],
            'password' => ['required'],
        ]);

        $datas['password'] = bcrypt($datas['password']);

        $user = User::create($datas);

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}

// $user = User::create([
//     'username' => $request->username,
//     'email' => $request->email,
//     'nis' => $request->nis,
//     'nip' => $request->nip,
//     'password' => Hash::make($request->password),
// ]);

// if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
//     $request->session()->regenerate();

//     return redirect('/login');
// }
