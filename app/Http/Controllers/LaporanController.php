<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $logs = Log::with(['mahasiswa.user', 'dosen.user'])->latest()->get();
        $breadcrumb = (object) [
            'title' => 'Laporan',
            'subtitle' => ['Laporan Harian']
        ];
        return view('mahasiswa.laporan.index', compact('breadcrumb','logs'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
        $dosen = Dosen::all();
        $breadcrumb = (object) [
            'title' => 'Buat Laporan',
            'subtitle' => ['Buat Laporan Magang']
        ];
        return view('mahasiswa.laporan.create', compact('breadcrumb', 'mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'dosen_id' => 'required|exists:dosens,dosen_id',
            'report_text' => 'required|string',
        ]);

        // Simpan log baru ke database
        Log::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'dosen_id' => $request->dosen_id,
            'report_text' => $request->report_text,
        ]);

        // Ambil data logs setelah insert
        $logs = Log::with(['mahasiswa.user', 'dosen.user'])->latest()->get();

        return redirect()->route('laporan')
                        ->with('success', 'Laporan berhasil dibuat.')
                        ->with('logs', $logs); // Pastikan logs juga dikirim
    }


    public function edit($id){
        $logs = Log::findOrFail($id);
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
        $dosen = Dosen::all();
        $breadcrumb = (object) [
            'title' => 'Edit Laporan',
            'subtitle' => ['Edit Laporan Magang']
        ];
        return view('mahasiswa.laporan.edit', compact('breadcrumb','logs', 'mahasiswa', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'dosen_id' => 'required|exists:dosens,dosen_id',
            'report_text' => 'required|string',
        ]);

        // Cari log berdasarkan ID
        $log = Log::findOrFail($id);

        // Update data log
        $log->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'dosen_id' => $request->dosen_id,
            'report_text' => $request->report_text,
        ]);

        return redirect()->route('laporan')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari log berdasarkan ID
        $log = Log::findOrFail($id);

        // Hapus log
        $log->delete();

        return redirect()->route('laporan')->with('success', 'Laporan berhasil dihapus.');
    }
}
