<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        $users = User::where('level_id', 1)->get();
        $breadcrumb = (object) [
            'title' => 'Semua Admin',
            'subtitle' => 'Jumlah total Admin yang terdaftar ' . $users->where('level_id', 1)->count()
        ];
        return view('admin.user.index', compact('levels', 'users', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Admin',
            'subtitle' => 'Formulir Pengisian Data Admin Baru'
        ];
        return view('admin.user.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'no_telp' => 'nullable|max:15',
            'alamat' => 'nullable|min:10',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = [
            'level_id' => 1,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/users', $imageName);
            $userData['image'] = $imageName;
        }

        User::create($userData);

        return redirect()->route('user.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $user = User::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Admin',
            'subtitle' => 'Detail Informasi Admin ' . $user->name
        ];
        return view('admin.user.show', compact('user', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::find($id);
        $breadcrumb = (object) [
            'title' => 'Tambah Admin',
            'subtitle' => 'Formulir Pengisian Data Admin Baru'
        ];
        return view('admin.user.edit', compact('user', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|unique:users,email,' . $user->user_id . ',user_id',
            'no_telp' => 'nullable|max:15',
            'alamat' => 'nullable|min:10|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $userData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/images/users/' . $user->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/users', $imageName);
            $userData['image'] = $imageName;
        }

        $user->update($userData);


        return redirect()->route('user.index')->with('success', 'Admin ' . $user->name . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        try {
            User::destroy($id);
            return redirect()->route('user.index')->with('success', 'Data Admin ' . $user->name . ' berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('user.index')->with('error', 'Data Admin ' . $user->name . ' gagal dihapus karena masih digunakan');
        }
    }
}
