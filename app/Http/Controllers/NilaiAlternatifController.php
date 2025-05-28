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
    public function edit(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        $nilai_lama = $alternatif->nilaiAlternatif()->pluck('nilai', 'kriteria_id')->toArray();
        return view('mahasiswa.alternatif.nilai', compact('alternatif', 'kriterias', 'nilai_lama'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();

        foreach ($kriterias as $kriteria) {
            NilaiAlternatif::updateOrCreate(
                ['alternatif_id' => $alternatif->alternatif_id, 'kriteria_id' => $kriteria->kriteria_id],
                ['nilai' => $request->input('nilai')[$kriteria->kriteria_id]]
            );
        }

        return redirect()->route('alternatif.index')->with('success', 'Nilai alternatif diperbarui');
    }
}
