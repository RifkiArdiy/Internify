<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Alternatif Magang',
            'subtitle' => 'Data Alternatif yang dipilih'
        ];

        $mahasiswa = auth()->user()->mahasiswa;
        $kriterias = Kriteria::all();

        // Ambil bobot sesuai mahasiswa login
        $bobotMahasiswa = DB::table('kriteria_mahasiswa')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->pluck('weight', 'kriteria_id');

        return view('mahasiswa.kriteria.index', compact('breadcrumb', 'kriterias', 'bobotMahasiswa'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Alternatif Magang',
            'subtitle' => 'Data Alternatif yang dipilih'
        ];

        return view('mahasiswa.kriteria.create', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required|min:3',
            'weight' => 'required|numeric',
            'jenis' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriterias.index');
    }

    public function edit(Kriteria $kriteria)
    {
        $breadcrumb = (object) [
            'title' => 'Alternatif Magang',
            'subtitle' => 'Data Alternatif yang dipilih'
        ];

        return view('mahasiswa.kriteria.edit', compact('breadcrumb', 'kriteria'));
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


    public function editBobot()
    {
        $breadcrumb = (object) [
            'title' => 'Alternatif Magang',
            'subtitle' => 'Data Alternatif yang dipilih'
        ];

        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->firstOrFail();
        $kriterias = Kriteria::all();

        $bobotLama = DB::table('kriteria_mahasiswa')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->pluck('weight', 'kriteria_id')
            ->toArray();

        return view('mahasiswa.kriteria.bobot', compact('breadcrumb', 'mahasiswa', 'kriterias', 'bobotLama'));
    }


    public function updateBobot(Request $request)
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'bobot' => 'required|array',
            'bobot.*' => 'required|numeric|min:0|max:1',
        ]);

        $total = array_sum($request->bobot);

        if (round($total, 2) > 1) {
            return back()->withInput()->withErrors(['bobot' => 'Total bobot tidak boleh lebih dari 1.']);
        }

        foreach ($request->bobot as $kriteria_id => $bobot) {
            DB::table('kriteria_mahasiswa')->updateOrInsert(
                [
                    'mahasiswa_id' => $mahasiswa->mahasiswa_id,
                    'kriteria_id' => $kriteria_id,
                ],
                [
                    'weight' => $bobot,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }

        return redirect()->route('kriteria.bobot.edit')->with('success', 'Bobot berhasil diperbarui.');
    }
}
