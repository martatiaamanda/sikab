<?php

namespace App\Http\Controllers\Auth\custom;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->name);
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string' ],
            'password_confirmation' => ['required', 'string', 'same:password'],
            'NIK' => ['required', 'string', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P', 'max:255'],
            'no_hp' => ['required', 'string', 'max:255'],
            'profile_ficture' => ['string', 'max:255'],
            // 'role' => ['required', 'string', 'max:255'],
        ]);
        // return $validator;


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


        return redirect()->route('login');
    }
}
