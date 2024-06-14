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
        $users = User::paginate(10);
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

}
