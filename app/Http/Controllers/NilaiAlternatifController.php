<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use App\Models\SkorKriteria;
use Illuminate\Http\Request;

class NilaiAlternatifController extends Controller
{
    //
    public function create($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $kriterias = Kriteria::all();

        // Ambil skor per kriteria
        $skorKriterias = [];
        foreach ($kriterias as $kriteria) {
            $skorKriterias[$kriteria->kriteria_id] = SkorKriteria::where('kriteria_id', $kriteria->kriteria_id)->get();
        }

        return view('mahasiswa.nilai.create', compact('alternatif', 'kriterias', 'skorKriterias'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nilai.*' => 'required|numeric',
        ]);

        foreach ($request->nilai as $kriteria_id => $nilai) {
            NilaiAlternatif::updateOrCreate(
                [
                    'alternatif_id' => $id,
                    'kriteria_id' => $kriteria_id,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }

        return redirect()->route('nilai.create', $id)->with('success', 'Nilai berhasil disimpan!');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $kriterias = Kriteria::with('skorKriterias')->get();
        $nilai_lama = $alternatif->nilaiAlternatif()->pluck('nilai', 'kriteria_id')->toArray();

        $skorKriterias = [];
        foreach ($kriterias as $kriteria) {
            $skorKriterias[$kriteria->kriteria_id] = $kriteria->skorKriterias;
        }

        return view('mahasiswa.nilai.edit', compact('alternatif', 'kriterias', 'nilai_lama', 'skorKriterias'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $kriterias = Kriteria::all();

        foreach ($kriterias as $kriteria) {
            NilaiAlternatif::updateOrCreate(
                ['alternatif_id' => $alternatif->alternatif_id, 'kriteria_id' => $kriteria->kriteria_id],
                ['nilai' => $request->input('nilai')[$kriteria->kriteria_id]]
            );
        }

        return response()->json(['message' => 'Nilai berhasil diperbarui']);
    }
}
