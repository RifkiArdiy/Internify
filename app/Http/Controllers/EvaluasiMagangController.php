<?php

// app/Http/Controllers/EvaluasiMagangController.php
namespace App\Http\Controllers;

use App\Models\EvaluasiMagang;
use App\Models\Mahasiswa;
use App\Models\Company;
use Illuminate\Http\Request;

class EvaluasiMagangController extends Controller
{
    public function index()
    {
        $evaluasis = EvaluasiMagang::with(['mahasiswa', 'company'])->get();
        return view('evaluasi_magang.index', compact('evaluasis'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        return view('evaluasi_magang.create', compact('mahasiswas', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'company_id' => 'required|exists:companies,company_id',
            'evaluasi' => 'required|string',
        ]);

        EvaluasiMagang::create($request->all());
        return redirect()->route('evaluasi_magang.index')->with('success', 'Evaluasi berhasil ditambahkan.');
    }

    public function show(EvaluasiMagang $evaluasi_magang)
    {
        return view('evaluasi_magang.show', compact('evaluasi_magang'));
    }

    public function edit(EvaluasiMagang $evaluasi_magang)
    {
        $mahasiswas = Mahasiswa::all();
        $companies = Company::all();
        return view('evaluasi_magang.edit', compact('evaluasi_magang', 'mahasiswas', 'companies'));
    }

    public function update(Request $request, EvaluasiMagang $evaluasi_magang)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
            'company_id' => 'required|exists:companies,company_id',
            'evaluasi' => 'required|string',
        ]);

        $evaluasi_magang->update($request->all());
        return redirect()->route('evaluasi_magang.index')->with('success', 'Evaluasi berhasil diperbarui.');
    }

    public function destroy(EvaluasiMagang $evaluasi_magang)
    {
        $evaluasi_magang->delete();
        return redirect()->route('evaluasi_magang.index')->with('success', 'Evaluasi berhasil dihapus.');
    }
}