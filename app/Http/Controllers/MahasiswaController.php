<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user', 'prodi')->get();
        $breadcrumb = (object) [
            'title' => 'Semua Mahasiswa',
            'subtitle' => ['Jumlah total Mahasiswa yang terdaftar ' . $mahasiswas->count()]
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
            'subtitle' => ['Formulir Pengisian Data Mahasiswa Baru']
        ];
        return view('admin.mahasiswa.create', compact('prodis', 'breadcrumb'));
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
            'nim' => 'required|min:10|unique:mahasiswas',
            'no_telp' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required|integer'
        ]);

        $user = User::create([
            'level_id' => 2, // student
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        Mahasiswa::create([
            'user_id' => $user->user_id,
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
        //
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
            'subtitle' => ['Edit Detail Mahasiswa']
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
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        // Update user data
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Update mahasiswa data
        $mahasiswa->update([
            'nim' => $request->nim,
            'prodi_id' => $request->prodi_id,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa ' . $mahasiswa->user->name . ' berhasil diperbarui.');
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
