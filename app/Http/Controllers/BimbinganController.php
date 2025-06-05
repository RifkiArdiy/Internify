<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\MagangApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbinganController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Bimbingan Anda',
            'subtitle' => 'Tabel Bimbingan'
        ];

        $mahasiswaId = Auth::user()->mahasiswa->mahasiswa_id;

        $bimbingans = Bimbingan::with(['dosen', 'magang.mahasiswas.user', 'magang.lowongans.company'])
            ->whereHas('magang', function ($q) use ($mahasiswaId) {
                $q->where('mahasiswa_id', $mahasiswaId);
            })
            ->orderByDesc('created_at')
            ->get();

        return view('mahasiswa.bimbingan.index', compact('breadcrumb', 'bimbingans'));
    }

    public function list()
    {
        $breadcrumb = (object)[
            'title' => 'Bimbingan Magang',
            'subtitle' => 'Bimbingan'
        ];

        $userId = Auth::id();

        $bimbingans = Bimbingan::with(['magang.mahasiswas.user', 'magang.lowongans.company'])
            ->where('dosen_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('dosen.bimbingan.index', compact('breadcrumb', 'bimbingans'));
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Bimbingan Magang',
            'subtitle' => 'Ajukan Bimbingan'
        ];

        $mahasiswa = Auth::user()->mahasiswa;
        $profilAkademik = $mahasiswa->profil_akademik;

        // ✅ Cek jika belum ada data atau salah satu file kosong
        if (
            !$profilAkademik ||
            empty($profilAkademik->etika) ||
            empty($profilAkademik->ipk)
        ) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Selesaikan Pendataan terlebih dahulu.');
        }

        $magang = MagangApplication::with('lowongans.company')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('status', 'Disetujui')
            ->first();

        if (!$magang) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Anda belum memiliki tempat magang.');
        }

        return view('mahasiswa.bimbingan.create', compact('breadcrumb', 'mahasiswa', 'magang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'magang_id' => 'required|exists:magang_applications,magang_id',
            'dosen_id' => 'required|exists:users,user_id',
            'dokumen_bimbingan' => 'required|file|mimes:pdf|max:2048',
            'dokumen_perusahaan' => 'required|file|mimes:pdf|max:2048',
        ]);

        $existing = Bimbingan::where('magang_id', $request->magang_id)->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan bimbingan untuk magang ini.');
        }

        // Nama file asli
        $fileNameBimbingan = $request->file('dokumen_bimbingan')->getClientOriginalName();
        $fileNamePerusahaan = $request->file('dokumen_perusahaan')->getClientOriginalName();

        // Simpan file ke storage/app/public/...
        $request->file('dokumen_bimbingan')->storeAs('dokumen_bimbingan', $fileNameBimbingan, 'public');
        $request->file('dokumen_perusahaan')->storeAs('dokumen_perusahaan', $fileNamePerusahaan, 'public');

        // Simpan ke database hanya nama file
        Bimbingan::create([
            'magang_id' => $request->magang_id,
            'dosen_id' => $request->dosen_id,
            'dokumen_bimbingan' => $fileNameBimbingan,
            'dokumen_perusahaan' => $fileNamePerusahaan,
            'status' => 'Pending',
        ]);

        return redirect()->route('bimbingan.index')->with('success', 'Pengajuan bimbingan berhasil dikirim.');
    }


    public function show($id)
    {
        $breadcrumb = (object)[
            'title' => 'Detail Bimbingan',
            'subtitle' => 'Data Pengajuan'
        ];

        $bimbingan = Bimbingan::with('magang.lowongans.company.user', 'magang.mahasiswas.user')->findOrFail($id);

        if ($bimbingan->dosen_id != auth()->id()) {
            abort(403);
        }

        return view('dosen.bimbingan.show', compact('breadcrumb', 'bimbingan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
        ]);

        $bimbingan = Bimbingan::findOrFail($id);

        if ($bimbingan->dosen_id != auth()->id()) {
            abort(403);
        }

        $bimbingan->status = $request->status;
        $bimbingan->tanggal_disetujui = now();
        $bimbingan->save();

        return redirect()->route('bimbingan.list', $id)->with('success', 'Status berhasil diperbarui.');
    }
}
