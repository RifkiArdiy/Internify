<?php

namespace App\Http\Controllers;

use App\Models\ProfilAkademik;
use App\Models\LowonganMagang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $profilAkademik = ProfilAkademik::where('user_id', Auth::user()->user_id)->first();
        if (!$profilAkademik) {
            return redirect()->route('profil-akademik.create');
        }
        $breadcrumb = (object) ['title' => null, 'subtitle' => null];

        return view('mahasiswa.profilAkademik.index', compact('user', 'profilAkademik', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Input Profile Akademik',
            'subtitle' => 'Formulir pengisian data profile akademik anda'
        ];

        return view('mahasiswa.profilAkademik.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ipk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'etika' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bidang_keahlian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'sertifikasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pengalaman' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $fields = ['bidang_keahlian', 'sertifikasi', 'pengalaman', 'etika', 'ipk'];
        $data = ['user_id' => Auth::user()->user_id];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);

                // Simpan file ke storage
                $filename = $file->getClientOriginalName();
                $file->storeAs("profil-akademik/$field", $filename, 'public');

                // Simpan hanya nama file ke database
                $data[$field] = $filename;
            }
        }

        ProfilAkademik::create($data);

        return redirect(route('profil-akademik.index'))->with('success', 'Profil Akademik berhasil ditambahkan');
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
    public function edit()
    {
        $profil = ProfilAkademik::where('user_id', Auth::user()->user_id)->first();
        $breadcrumb = (object) [
            'title' => 'Edit Profil Akademik',
            'subtitle' => 'Perbarui Profil Akademik Anda'
        ];
        return view('mahasiswa.profilAkademik.edit', compact('profil', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bidang_keahlian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'sertifikasi'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pengalaman'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'etika'           => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'ipk'             => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $profil = ProfilAkademik::findOrFail($id);
        $fields = ['bidang_keahlian', 'sertifikasi', 'pengalaman', 'etika', 'ipk'];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Simpan file baru
                $file = $request->file($field);
                $filename = $file->getClientOriginalName();

                $file->storeAs("profil-akademik/$field", $filename, 'public');

                // Hapus file lama
                if ($profil->$field) {
                    Storage::disk('public')->delete("profil-akademik/$field/" . $profil->$field);
                }

                $profil->$field = $filename;
            } else {
                // Tidak upload baru, pakai file lama
                $profil->$field = $request->input("old_$field");
            }
        }

        $profil->save();

        return redirect()->route('profil-akademik.index')->with('success', 'Profil berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
