<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user', 'prodi')->get();
        $breadcrumb = (object) [
            'title' => 'Mahasiswa',
            'subtitle' => 'Jumlah total Mahasiswa ' . $mahasiswas->count()
        ];
        return view('admin.mahasiswa.index', compact('mahasiswas', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = ProgramStudi::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Mahasiswa',
            'subtitle' => 'Formulir Pengisian Data Mahasiswa Baru'
        ];
        return view('admin.mahasiswa.create', compact('prodis', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'nim' => 'required|string|min:10|unique:mahasiswas,nim',
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:100|min:10',
            'prodi_id' => 'required|integer|exists:program_studis,prodi_id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare user data
        $userData = [
            'level_id' => 2, // Mahasiswa
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ];

        // Handle uploaded image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/users', $imageName);
            $userData['image'] = $imageName;
        }

        // Create user and get custom primary key
        $user = User::create($userData);

        // Create Mahasiswa using custom user_id
        Mahasiswa::create([
            'user_id' => $user->user_id, // Custom PK
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::with('user', 'prodi')->findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Mahasiswa',
            'subtitle' => 'Detail Informasi Mahasiswa ' . $mahasiswa->user->name
        ];
        return view('admin.mahasiswa.show', compact('mahasiswa', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = ProgramStudi::all();
        $mahasiswa = Mahasiswa::find($id);
        $breadcrumb = (object) [
            'title' => 'Edit Mahasiswa',
            'subtitle' => 'Edit Detail Mahasiswa'
        ];
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodis', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);
        $user = $mahasiswa->user;

        // Validasi input
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|unique:users,email,' . $user->user_id . ',user_id',
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->mahasiswa_id . ',mahasiswa_id',
            'prodi_id' => 'required|exists:program_studis,prodi_id',
            'no_telp' => 'nullable|max:15',
            'alamat' => 'nullable|min:10|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/images/users/' . $user->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/users', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        // Update data mahasiswa
        $mahasiswa->update([
            'nim' => $request->nim,
            'prodi_id' => $request->prodi_id,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa ' . $user->name . ' berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->user->delete(); // Hapus user otomatis
        $mahasiswa->delete();
        try {
            Mahasiswa::destroy($id);
            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa ' . $mahasiswa->user->name . ' berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa ' . $mahasiswa->user->name . ' gagal dihapus karena masih digunakan');
        }
    }
    
}
