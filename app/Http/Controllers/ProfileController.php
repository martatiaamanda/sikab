<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    public function update_foto(Request $request )
    {

        $user = $request->query('user');
        $user = htmlspecialchars($user);

        if(!User::where('id', $user)->exists()) {
            return Redirect::back()->with('error', 'User tidak ditemukan');
        }

        $request->validate([
            'profile_ficture' => ['required', 'image', 'max:1024'],
        ], [
            'profile_ficture.required' => 'Foto profil wajib diisi',
            'profile_ficture.image' => 'Foto profil harus berupa gambar',
            'profile_ficture.max' => 'Foto profil tidak boleh lebih dari 1MB',
        ]);

        $file = $request->file('profile_ficture');
        $file_name = $user . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile', $file_name);


        $user_data = UserData::where('user_id', $user)->first();

        if($user_data) {
            $user_data->update([
                'profile_ficture' => $file_name
            ]);
        } else {
            UserData::create([
                'user_id' => $user,
                'profile_ficture' => $file_name
            ]);
        }

        return Redirect::back()->with('success', 'Foto profil berhasil diubah');
    }

    public function update_data(Request $request) {

        $user = $request->query('user');
        $user = htmlspecialchars($user);

        $user = User::findOrfail($user);

        if(!$user) {
            return Redirect::back()->with('error', 'User tidak ditemukan');
        }

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'NIK' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'no_hp' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'Nama harus diisi',
            'NIK.required' => 'NIK harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'no_hp.required' => 'Nomor Handphone harus diisi',
        ]);

        if (!$validator) {
            return redirect()
                ->back()
                ->with('error', $validator)
                ->withInput();
        }

        $user->update([
            'NIK' => $request->NIK,
            'name' => $request->name,
        ]);

        $user->user_data()->update([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('profile')->with('success', 'Data berhasil diubah');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
