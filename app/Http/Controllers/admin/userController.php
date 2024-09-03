<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
    public function index()
    {
        $users = User::get();
        return view('admin.master.user', compact('users'));
    }

    public function show(User $id)
    {

        // $user = User::findOrFail($id);
        $user = $id;
        // dd($user);
        return view('admin.master.user-show', compact('user'));
        // dd($id);
    }

    public function create()
    {
        return view('admin.master.user.create');
    }

    public function store(Request $request)
    {
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
            'name' => $request->name,
            'NIK' => $request->NIK,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        $user->user_data()->create([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.user.show', $user->id)->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        $user = $id;
        return view('admin.master.user-edit', compact('user'));
    }

    public function update(User $id, Request $request)
    {
        $user = $id;

        $user->name = $request->name;
        $user->NIK = $request->NIK;
        $user->email = $request->email;
        $user->role = $user->role;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        $user->user_data()->update([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.user.show', $id->id)->with('success', 'User updated successfully!');
    }

    public function updatePassword(User $id, Request $request)
    {

        $user = $id;
        $request->validate([
            // 'password' => [ 'string' ],
            'password_confirmation' => ['same:password'],
        ], [
            'password_confirmation.same' => 'Password tidak sama',
        ]);

        if (!$request->password) {
            $pass = '123456';
        } else {
            $pass = $request->password;
        }





        $user->password = Hash::make($pass);
        $user->save();

        return redirect()->route('admin.user.show', $id->id)->with('success', 'Password updated successfully!');
    }

    public function destroy(User $id)
    {
        $user = $id;
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully!');
    }
}
