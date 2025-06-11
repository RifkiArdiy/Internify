<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
        ];

        if ($request->hasFile('image')) {
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $request->file('image')->store('images/profile', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data); // INI AKAN BERHASIL karena fillable sudah lengkap

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }


    public function viewNotif()
    {
        $breadcrumb = (object) [
            'title' => 'Notifikasi',
            'subtitle' => 'Pemberitahuan untuk anda'
        ];

        return view('notif.index', compact('breadcrumb'));
    }
}
