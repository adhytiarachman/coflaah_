<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisteredUserController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        // validasi dan simpan user nanti di sini
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => 'User', // default atau bisa ditambah input name
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // <== hanya user!
        ]);


        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
