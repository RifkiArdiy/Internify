<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dosens = Dosen::with('user')->get();
        $breadcrumb = (object) [
            'title' => 'Semua Dosen',
            'subtitle' => ['Jumlah total Dosen yang terdaftar ' . $dosens->count()]
        ];
        return view('admin.dosen.index', compact('dosens', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $breadcrumb = (object) [
            'title' => 'Tambah Dosen',
            'subtitle' => ['Formulir Pengisian Data Dosen Baru']
        ];
        return view('admin.dosen.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'nip' => 'required|unique:dosens',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);

        $user = User::create([
            'level_id' => 3, // dosen
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        Dosen::create([
            'user_id' => $user->user_id,
            'nip' => $request->nip,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
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
        //
        $dosen = Dosen::find($id);
        $breadcrumb = (object) [
            'title' => 'Edit Dosen',
            'subtitle' => ['Edit Detail Dosen']
        ];
        return view('admin.dosen.edit', compact('dosen', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dosen = Dosen::with('user')->findOrFail($id);
        $user = $dosen->user;

        // Validasi input
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|unique:users,email,' . $user->user_id . ',user_id',
            'nip' => 'required|unique:dosens,nip,' . $dosen->dosen_id . ',dosen_id',
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

        // Update dosen data
        $dosen->update([
            'nip' => $request->nip,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen ' . $dosen->user->name . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $dosen = Dosen::find($id);
        $dosen->user->delete(); // Hapus user otomatis
        $dosen->delete();
        try {
            Dosen::destroy($id);
            return redirect()->route('dosen.index')->with('success', 'Dosen ' . $dosen->user->name . ' berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dosen.index')->with('error', 'Dosen ' . $dosen->user->name . ' gagal dihapus karena masih digunakan');
        }
    }
}
