<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\EvaluasiMagang;
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
            'title' => 'Dosen',
            'subtitle' => ['Jumlah Dosen : ' . $dosens->count()]
        ];
        return view('dosen.index', compact('dosens', 'breadcrumb'));
    }

    // Tambahkan method ini ke EvaluasiMagangController
    public function indexDosen()
    {
        $evaluasis = EvaluasiMagang::with(['mahasiswa.user', 'company'])
                    ->orderBy('evaluasi_id', 'desc')
                    ->get();
                    
        return view('evaluasi_magang.index_dosen', [
            'evaluasis' => $evaluasis,
            'title' => 'Evaluasi Magang - Dosen'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $breadcrumb = (object) [
            'title' => 'Tambah Dosen',
            'subtitle' => ['Form Validation']
        ];
        return view('dosen.create', compact('breadcrumb'));
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
        ]);

        Dosen::create([
            'user_id' => $user->user_id,
            'nip' => $request->nip,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('dosen.index')->with('success', 'dosen berhasil ditambahkan.');
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
        $dosen = Dosen::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Dosen',
            'subtitle' => ['Form untuk mengedit data dosen']
        ];

        return view('dosen.edit', compact('dosen', 'breadcrumb'));
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
            'alamat' => 'required',
        ]);

        // Update user data
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Update dosen data
        $dosen->update([
            'nip' => $request->nip,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('dosen.index')->with('success', 'dosen berhasil diperbarui.');
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

        return redirect()->route('dosen.index')->with('success', 'dosen berhasil dihapus.');
    }

    public function profilSaya()
    {
        $dosen = Dosen::with('user')->where('user_id', auth()->id())->firstOrFail();
    
        $breadcrumb = (object) [
            'title' => 'Profil Saya',
            'subtitle' => ['Halaman untuk melihat dan mengedit profil dosen']
        ];
    
        return view('dosen.profil', compact('dosen', 'breadcrumb'));
    }
    
    public function updateProfilSaya(Request $request)
    {
        $dosen = Dosen::with('user')->where('user_id', auth()->id())->firstOrFail();
        $user = $dosen->user;
    
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|unique:users,email,' . $user->user_id . ',user_id',
            'nip' => 'required|unique:dosens,nip,' . $dosen->dosen_id . ',dosen_id',
            'alamat' => 'required',
        ]);
    
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);
    
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }
    
        $dosen->update([
            'nip' => $request->nip,
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('dosen.profil')->with('success', 'Profil berhasil diperbarui.');
    }
    
}
