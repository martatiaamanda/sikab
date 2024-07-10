<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $user = User::where('role', 'admin')->first();

        $nomor_hp = $user->user_data->no_hp;
        return view('auth.login', compact('nomor_hp'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // dd(Auth::user()->role);
        $intended = $request->session()->get('url.intended', '');
        // dd($intended);



        if (Auth::user()->role === 'admin') {
            if (Str::contains($intended, '/admin')) {
                // dd($intended);
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }
            return redirect()->route('admin.dashboard');
        } 

        if (Str::contains($intended, '/admin')) {
            return redirect()->route('user.buat-surat');
        }
        return redirect()->intended(route('user.buat-surat', absolute: false));


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
