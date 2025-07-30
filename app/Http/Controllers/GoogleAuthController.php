<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        // Tangani jika user membatalkan login Google
        if (request()->has('error')) {
            return redirect('/login')->with('error', 'Login dengan Google dibatalkan.');
        }

        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Terjadi kesalahan saat login Google.');
        }

        // Buat atau perbarui user
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(16)),
                'role' => 'user', // default role
            ]
        );

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', 'Berhasil login dengan Google!');
    }
}
