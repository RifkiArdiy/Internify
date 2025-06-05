<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $breadcrumb = (object) [
            'title' => 'Profile',
            'subtitle' => 'Selamat datang di halaman profil ' . $user->name
        ];

        return view('profile.index', compact('user', 'breadcrumb'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // public function update(Request $request)
    // {
    //     $user = Auth::user();
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username,' . $user->id,
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'password' => 'nullable|string|min:6|confirmed',
    //     ]);

    //     $user->update([
    //         'name' => $request->name,
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'image' => $request->file('image') ? $request->file('image')->store('images/profile', 'public') : $user->image,
    //         'password' => $request->password ? bcrypt($request->password) : $user->password,
    //     ]);

    //     return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    // }

    public function viewNotif(){
        $breadcrumb = (object) [
            'title' => 'Notifikasi',
            'subtitle' => 'Pemberitahuan untuk anda'
        ];

        return view('notif.index', compact('breadcrumb'));
    }

}
