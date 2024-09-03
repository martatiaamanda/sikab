<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        if (!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['email' => 'Alamat email tidak valid.']);
        }
        // dd($request->name);
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'password_confirmation' => ['required', 'same:password'],
            'NIK' => ['required', 'string', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'no_hp' => ['required', 'string', 'max:255'],
            // 'profile_ficture' => ['string', 'max:255'],
            // 'role' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'Nama harus diisi',
            'NIK.unique' => 'NIK sudah terdaftar',
            'NIK.required' => 'NIK harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password_confirmation.same' => 'Password tidak sama',
            'password_confirmation.required' => 'Password konfirmasi harus diisi',
            'password.string' => 'Password harus berupa string',
            'password_confirmation.required' => 'Password konfirmasi harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'no_hp.required' => 'Nomor Handphone harus diisi',
        ]);


        $user = User::create([
            'NIK' => $request->NIK,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->user_data()->create([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'profile_ficture' => $request->profile_ficture,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(route('user.buat-surat', absolute: false));
    }
}
