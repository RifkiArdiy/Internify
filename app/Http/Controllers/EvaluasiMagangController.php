<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiMagang;
use App\Models\Mahasiswa;
use App\Models\Company;
use Illuminate\Http\Request;

class EvaluasiMagangController extends Controller
{

    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Evaluasi Magang',
            'subtitle' => ['Jumlah Evaluasi Magang ' . EvaluasiMagang::count()]
        ];
        $evaluations = EvaluasiMagang::with('mahasiswa', 'company')->latest()->get();
        return view('dosen.evaluasi.index', ['evaluasi' => $evaluations], compact('breadcrumb'));
    }  

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Evaluasi Magang',
            'subtitle' => ['Form Validation']
        ];
        return view('dosen.evaluasi.create', compact('mahasiswas', 'companies', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'company_id' => 'required|exists:companies,company_id',
            'evaluasi' => 'required|string',
        ]);

        EvaluasiMagang::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'company_id' => $request->company_id,
            'evaluasi' => $request->evaluasi,
        ]);

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil disimpan');
    }

    public function edit($id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Edit Evaluasi Magang',
            'subtitle' => ['Form Validation']
        ];

        return view('dosen.evaluasi.edit', [
            'evaluation' => $evaluation,
            'mahasiswas' => $mahasiswas,
            'companies' => $companies,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function update(Request $request, $id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);

        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'company_id' => 'required|exists:companies,company_id',
            'evaluasi' => 'required|string',
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil dihapus');
    }
}