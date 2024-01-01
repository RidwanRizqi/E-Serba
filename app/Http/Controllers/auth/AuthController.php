<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['password'] = Hash::make($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->role = 'user';
        $user->email = $request->email;
        $user->password = $data['password'];
        $user->is_active = false;
        $user->email_verified_at = now();
        $user->save();


        // auth()->login($user);

        return redirect('/logins')->with('success', 'Pendaftran berhasil, silahkan tunggu konfirmasi dari admin!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/')->with('success', 'You have been logged out!');
        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            if (auth()->user()->is_active == false) {
                auth()->logout();
                return back()->with('error', 'Akun anda belum aktif, silahkan hubungi admin!');
            }
            $request->session()->regenerate();

            return redirect(RouteServiceProvider::HOME)->with('message', 'You are now logged in!');
        }

        return back()->with('error', 'Invalid email or password.');
        // return back()->with('error', 'Invalid Credentials.');
    }
}
