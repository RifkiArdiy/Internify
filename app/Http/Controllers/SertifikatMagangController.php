<?php

namespace App\Http\Controllers;

use App\Models\PeriodeMagang;
use App\Models\LowonganMagang;
use App\Models\SertifikatMagang;
use App\Models\SertifikatMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SertifikatMagangController extends Controller
{
    // Index untuk perusahaan melihat daftar sertifikat
    public function index()
    {
        $sertifikats = SertifikatMagang::where('company_id', Auth::user()->company->company_id)
            ->latest()
            ->get();
        $breadcrumb = (object) [
            'title' => 'Sertifikat Magang',
            'subtitle' => 'Daftar Sertifikat Magang'
        ];
        return view('company.sertifikatMagang.index', compact('sertifikats', 'breadcrumb'));
    }

    public function indexMhs()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        // Ambil aplikasi magang mahasiswa yang statusnya sedang dijalani
        $magangBerlangsung = $mahasiswa->applications()
            ->where('status', 'Disetujui') // atau 'berlangsung' jika ada
            ->first();

        if ($magangBerlangsung) {
            $lowonganId = $magangBerlangsung->lowongan_id;

            // Ambil sertifikat yang berkaitan dengan lowongan tersebut
            $sertifikats = SertifikatMagang::where('lowongan_id', $lowonganId)
                ->with('sertifikatMahasiswa')
                ->latest()
                ->get();
        } else {
            // Tidak ada magang aktif
            $sertifikats = collect(); // kosongkan koleksi
        }

        $breadcrumb = (object) [
            'title' => 'Sertifikat Magang',
            'subtitle' => 'Daftar Sertifikat Magang'
        ];

        return view('mahasiswa.sertifikatMahasiswa.index', compact('sertifikats', 'breadcrumb'));
    }


    // Form create untuk perusahaan
    public function create()
    {
        $lowongans = LowonganMagang::where('company_id', Auth::user()->company->company_id)
            ->latest()
            ->get();
        $breadcrumb = (object) [
            'title' => 'Sertifikat Magang',
            'subtitle' => 'Unggah Sertifikat Magang'
        ];
        return view('company.sertifikatMagang.create', compact('breadcrumb', 'lowongans'));
    }

    // Simpan data sertifikat yang diupload perusahaan
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,company_id',
            'lowongan_id' => 'required|exists:lowongan_magangs,lowongan_id',
            'deskripsi' => 'required|string',
        ]);

        // $file = $request->file('sertifikat');
        // $filename = time().'_'.$file->getClientOriginalName();
        // $path = $file->storeAs('public/sertifikat', $filename);
        $lowongan = LowonganMagang::findOrFail($request->lowongan_id);

        SertifikatMagang::create([
            'company_id' => Auth::user()->company->company_id,
            'lowongan_id' => $request->lowongan_id,
            'judul' => $lowongan->title,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('company.sertifikatMagang.index')->with('success', 'Sertifikat berhasil diunggah.');
    }

    // Detail sertifikat
    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Sertifikat Magang',
            'subtitle' => 'Detail Sertifikat Magang'
        ];
        $sertifikat = SertifikatMagang::findOrFail($id);
        return view('company.sertifikatMagang.show', compact('sertifikat', 'breadcrumb'));
    }

    // Form edit sertifikat
    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Sertifikat Magang',
            'subtitle' => 'Edit Sertifikat Magang'
        ];
        $sertifikat = SertifikatMagang::findOrFail($id);
        return view('company.sertifikatMagang.edit', compact('sertifikat', 'breadcrumb'));
    }

    // Update sertifikat
    public function update(Request $request, $id)
    {
        $sertifikat = SertifikatMagang::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'sertifikat' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('sertifikat')) {
            $file = $request->file('sertifikat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/sertifikat', $filename);
            $data['path'] = $path;
        }

        $sertifikat->update($data);

        return redirect()->route('company.sertifikatMagang.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    // Download dan generate PDF dengan nama mahasiswa
    // public function download($id)
    // {
    //     $sertifikat = SertifikatMagang::findOrFail($id);
    //     $mahasiswa = Auth::user()->mahasiswa;

    //     // Simpan catatan unduhan
    //     SertifikatMahasiswa::create([
    //         'sertifikat_id' => $sertifikat->sertifikat_id,
    //         'mahasiswa_id' => $mahasiswa->mahasiswa_id,
    //         'nama_mahasiswa' => $mahasiswa->user->name,
    //         'donwloaded_at' => now(),
    //     ]);

    //     $pdf = Pdf::loadView('sertifikat.template', [
    //         'judul' => $sertifikat->judul,
    //         'nama_mahasiswa' => $mahasiswa->user->name,
    //         'tanggal' => now()->format('d F Y')
    //     ]);

    //     return $pdf->download('sertifikat_'.$mahasiswa->user->name.'.pdf');
    // }

    public function downloadMhs($id)
    {
        Carbon::setLocale('id');

        $sertifikat = SertifikatMagang::findOrFail($id);
        $mahasiswa = Auth::user()->mahasiswa;
        $periode = PeriodeMagang::latest()->first();
        $lowongan = LowonganMagang::latest()->first();
        // Simpan catatan unduhan
        SertifikatMahasiswa::create([
            'sertifikat_id' => $sertifikat->sertifikat_id,
            'mahasiswa_id' => $mahasiswa->mahasiswa_id,
            'nama_mahasiswa' => $mahasiswa->user->name,
            'downloaded_at' => now(),
        ]);

        $pdf = Pdf::loadView('mahasiswa.sertifikatMahasiswa.template', [
            'judul' => $sertifikat->judul,
            'nama_mahasiswa' => $mahasiswa->user->name,
            'deskripsi' => $sertifikat->deskripsi,
            'tanggal' => Carbon::now()->translatedFormat('d F Y'),
            'nama_perusahaan' => $sertifikat->company->user->name,
            'mulai' => $periode->start_date,
            'selesai' => $periode->end_date,
            'lowongan' => $lowongan->title,
        ])->setPaper('A4', 'landscape');

        return $pdf->download('sertifikat_' . $mahasiswa->user->name . '.pdf');
    }

    public function destroy($id)
    {
        $sertifikat = SertifikatMagang::findOrFail($id);
        $sertifikat->delete();

        return redirect()->route('company.sertifikatMagang.index')->with('success', 'Sertifikat berhasil dihapus.');
    }
}
