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
            'subtitle' => ['Jumlah total Evaluasi Magang ' . EvaluasiMagang::count()]
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
        return view('evaluasi_magang.create', compact('mahasiswas', 'companies', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'company_id' => 'required|exists:companies,id',
            'evaluasi' => 'required|string',
        ]);

        EvaluasiMagang::create($request->all());

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil disimpan');
    }

    public function edit($id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        return view('evaluasi_magang.edit', [
            'evaluasi_magang' => $evaluation,
            'mahasiswas' => $mahasiswas,
            'companies' => $companies
        ]);
    }


    public function update(Request $request, $id)
    {
        $evaluation = EvaluasiMagang::findOrFail($id);

        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'company_id' => 'required|exists:companies,id',
            'evaluasi' => 'required|string',
        ]);

        $evaluation->update($request->all());

        return redirect()->route('dosen.evaluasi.index')->with('success', 'Evaluasi berhasil diperbarui');
    }
}