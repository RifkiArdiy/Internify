<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiMagang;
use App\Models\Mahasiswa;
use App\Models\Log;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluasiMagangController extends Controller
{

    public function index()
    {
        $logs = Log::all();
        $breadcrumb = (object) [
            'title' => 'Evaluasi Magang',
            'subtitle' => 'Jumlah Evaluasi Magang ' . EvaluasiMagang::count()
        ];
        $evaluations = EvaluasiMagang::with('mahasiswa', 'company')->latest()->get();
        return view('dosen.evaluasi.index', ['evaluasi' => $evaluations], compact('breadcrumb', 'logs'));
    }

    public function indexMhs()
    {
        $mahasiswa = Auth::user()->mahasiswa; // Ambil data mahasiswa dari user yang login

        $breadcrumb = (object) [
            'title' => 'Evaluasi Magang',
            'subtitle' => 'Jumlah Evaluasi Magang: ' . EvaluasiMagang::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->count()
        ];

        $logs = Log::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->get();

        $evaluations = EvaluasiMagang::with(['mahasiswa', 'company'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->latest()
            ->get();

        return view('mahasiswa.evaluasi.index', compact('evaluations', 'breadcrumb', 'logs'));
    }

    public function showMhs($id)
    {
        $evaluation = EvaluasiMagang::with('mahasiswa.user', 'company.user')->findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        $logs = Log::all();

        $breadcrumb = (object) [
            'title' => 'Detail Evaluasi Magang',
            'subtitle' => 'Form Validation'
        ];
        return view('mahasiswa.evaluasi.show', compact('evaluation', 'mahasiswas', 'companies', 'logs', 'breadcrumb'));
    }

    public function create(Request $request)
    {
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        $logs = Log::all();
        $mahasiswaId = $request->query('mahasiswa_id');
        $companyId = $request->query('company_id');
        $logId = $request->query('log_id');

        $breadcrumb = (object) [
            'title' => 'Tambah Evaluasi Magang',
            'subtitle' => 'Form Validation'
        ];
        return view('dosen.evaluasi.create', compact('logId', 'logs', 'mahasiswas', 'companies', 'breadcrumb', 'mahasiswaId', 'companyId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'company_id' => 'required|exists:companies,company_id',
            'log_id' => 'required|exists:logs,log_id',
            'evaluasi' => 'required|string',
        ]);

        EvaluasiMagang::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'company_id' => $request->company_id,
            'log_id' => $request->log_id,
            'evaluasi' => $request->evaluasi,
        ]);

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil disimpan');
    }

    public function edit($id, Request $request)
    {
        $evaluation = EvaluasiMagang::with('mahasiswa.user', 'company.user')->findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        $logs = Log::all();
        $mahasiswaId = $request->query('mahasiswa_id');
        $companyId = $request->query('company_id');
        $logId = $request->query('log_id');

        $breadcrumb = (object) [
            'title' => 'Edit Evaluasi Magang',
            'subtitle' => 'Form Validation'
        ];

        return view('dosen.evaluasi.edit', compact('evaluation', 'logId', 'logs', 'mahasiswas', 'companies', 'breadcrumb', 'mahasiswaId', 'companyId'));
    }


    public function update(Request $request, $id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);

        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'company_id' => 'required|exists:companies,company_id',
            'log_id' => 'required|exists:logs,log_id',
            'evaluasi' => 'required|string',
        ]);

        $evaluation->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'company_id' => $request->company_id,
            'log_id' => $request->log_id,
            'evaluasi' => $request->evaluasi,
        ]);

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil dihapus');
    }

    public function verifikasiDosenDanRedirect($log_id)
    {
        $log = Log::findOrFail($log_id);
        $log->verif_dosen = 'Disetujui';
        $log->save();

        return redirect()->route('evaluasi.create', [
            'mahasiswa_id' => $log->mahasiswa_id,
            'company_id' => $log->company_id,
            'log_id' => $log->log_id,
        ]);
    }
}
