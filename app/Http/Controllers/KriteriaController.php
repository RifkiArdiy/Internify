<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('mahasiswa.kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('mahasiswa.kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'weight' => 'required|numeric',
            'jenis' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriterias.index');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('mahasiswa.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'weight' => 'required|numeric',
            'jenis' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriterias.index');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return back();
    }
}
