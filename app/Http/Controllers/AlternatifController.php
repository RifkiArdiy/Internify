<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlternatifController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Alternatif Magang',
            'subtitle' => 'Data Alternatif yang dipilih'
        ];

        $user = Auth::user();

        // Ambil ID mahasiswa berdasarkan user login
        $mahasiswaId = $user->mahasiswa->mahasiswa_id;

        // Hanya ambil alternatif milik mahasiswa ini
        // $alternatifs = Alternatif::with(['mahasiswa', 'lowongan'])
        //     ->where('mahasiswa_id', $mahasiswaId)
        //     ->get();

        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::with(['mahasiswa', 'lowongan', 'nilaiAlternatif'])->where('mahasiswa_id', $mahasiswaId)->get();

        return view('mahasiswa.alternatif.index', compact('breadcrumb', 'alternatifs', 'kriterias'));
    }


    public function create()
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->firstOrFail();
        $lowongans = LowonganMagang::all();

        return view('mahasiswa.alternatif.create', compact('mahasiswa', 'lowongans'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|array',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->firstOrFail();

        foreach ($request->lowongan_id as $lowonganId) {
            Alternatif::firstOrCreate([
                'mahasiswa_id' => $mahasiswa->mahasiswa_id,
                'lowongan_id' => $lowonganId,
            ]);
        }

        return response()->json(['message' => 'Alternatif berhasil ditambahkan.']);
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return back();
    }
}
