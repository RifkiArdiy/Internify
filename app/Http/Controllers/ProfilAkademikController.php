<?php

namespace App\Http\Controllers;

use App\Models\ProfilAkademik;
use App\Models\LowonganMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfilAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profilAkademik = ProfilAkademik::where('user_id', Auth::user()->user_id)->first();
        if (!$profilAkademik) {
            return redirect()->route('profil-akademik.create');
        }
        $breadcrumb = (object) [
            'title' => 'Profil Akademik Anda',
            'subtitle' => ['Lihat detail profil akademik anda']
        ];

        return view('mahasiswa.profilAkademik.index', compact('profilAkademik', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = LowonganMagang::select('requirements')
            ->distinct()
            ->pluck('requirements');
        $breadcrumb = (object) [
            'title' => 'Input Profile Akademik',
            'subtitle' => ['Formulir pengisian data profile akademik anda']
        ];

        return view('mahasiswa.profilAkademik.create', compact('breadcrumb', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProfilAkademik::create([
            'user_id' => Auth::user()->user_id,
            'bidang_keahlian' => $request->bidang_keahlian,
            'sertifikasi' => $request->sertifikasi,
            'lokasi' => $request->lokasi,
            'pengalaman' => $request->pengalaman,
            'etika' => $request->etika,
            'ipk' => str_replace(',', '.', $request->ipk),
        ]);

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
        $profilAkademik = ProfilAkademik::where('user_id', Auth::user()->user_id)->first();
        $kriteria = LowonganMagang::select('requirements')
            ->distinct()
            ->pluck('requirements');
        $breadcrumb = (object) [
            'title' => 'Edit Profil Akademik',
            'subtitle' => ['Perbarui Profil Akademik Anda']
        ];

        return view('mahasiswa.profilAkademik.edit', compact('profilAkademik', 'breadcrumb', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profilAkademik = ProfilAkademik::find($id);
        $profilAkademik->update([
            'user_id' => Auth::user()->user_id,
            'bidang_keahlian' => $request->bidang_keahlian,
            'sertifikasi' => $request->sertifikasi,
            'lokasi' => $request->lokasi,
            'pengalaman' => $request->pengalaman,
            'etika' => $request->etika,
            'ipk' => str_replace(',', '.', $request->ipk),
        ]);

        return redirect(route('profil-akademik.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
