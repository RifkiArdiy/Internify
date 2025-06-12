<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'subtitle' => 'Jumlah total Dosen yang terdaftar: ' . $dosens->count()
        ];

        return view('admin.dosen.index', compact('dosens', 'breadcrumb'));
    }

    public function indexVerifikasi()
    {
        $dosen = auth()->user()->dosen;

        $logs = Log::with(['mahasiswa.user', 'dosen.user'])
            ->where('dosen_id', $dosen->dosen_id) // filter hanya laporan milik dosen tersebut
            ->latest()
            ->get();

        $breadcrumb = (object) [
            'title' => 'Verifikasi Laporan Mahasiswa',
            'subtitle' => 'Laporan Harian'
        ];
        return view('dosen.verifikasi', compact('breadcrumb', 'logs'));
    }


    public function updateVerifikasi(Request $request, string $id)
    {
        $logs = Log::find($id);

        $logs->update([
            'verif_dosen' => $request->verif_dosen,
        ]);

        return redirect('dosen.verifikasi')->with('success', 'Laporan berhasil diverifikasi');
    }

    public function showLaporan($id)
    {
        $logs = Log::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Laporan',
            'subtitle' => 'Detail Laporan Magang'
        ];
        return view('dosen.show', compact('breadcrumb', 'logs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $breadcrumb = (object) [
            'title' => 'Tambah Dosen',
            'subtitle' => 'Formulir Pengisian Data Dosen Baru'
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
            'name' => 'required|min:3',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'nip' => 'required|unique:dosens|min:18|max:18',
            'no_telp' => 'nullable|max:15',
            'alamat' => 'nullable|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = [
            'level_id' => 3, // dosen
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

        // Create user and get custom primary key
        $user = User::create($userData);

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
        $dosen = Dosen::with('user')->findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Dosen',
            'subtitle' => 'Detail Informasi Dosen ' . $dosen->user->name
        ];
        return view('admin.dosen.show', compact('dosen', 'breadcrumb'));
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
            'subtitle' => 'Edit Detail Dosen'
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
            'nip' => 'required|min:18|max:18|unique:dosens,nip,' . $dosen->dosen_id . ',dosen_id',
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
        try {
            $company = Company::findOrFail($id);
            $nama = $company->user->name;

            // Hapus user-nya juga jika diperlukan
            $company->user()->delete();
            $company->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Perusahaan {$nama} berhasil dihapus."
                ]);
            }

            return redirect()->route('company.index')->with('success', "Perusahaan {$nama} berhasil dihapus.");
        } catch (\Exception $e) {
            $msg = 'Gagal menghapus perusahaan.';
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => $msg], 500);
            }

            return redirect()->route('company.index')->with('error', $msg);
        }
    }
}
