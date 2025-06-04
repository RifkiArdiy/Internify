<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Http\Request;

class SPKController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        $alternatifs = Alternatif::with('mahasiswa.user', 'lowongan')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->get();

        $kriterias = Kriteria::all();

        // Matriks awal
        $matrix = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $krit) {
                $nilai = NilaiAlternatif::where('alternatif_id', $alt->alternatif_id)
                    ->where('kriteria_id', $krit->kriteria_id)
                    ->value('nilai') ?? 0;
                $matrix[$alt->alternatif_id][$krit->kriteria_id] = $nilai;
            }
        }

        // Normalisasi min-max (0-1)
        $normalized = [];
        foreach ($kriterias as $krit) {
            $values = array_column($matrix, $krit->kriteria_id);
            $min = min($values);
            $max = max($values);

            foreach ($alternatifs as $alt) {
                $v = $matrix[$alt->alternatif_id][$krit->kriteria_id];
                if ($max != $min) {
                    if ($krit->jenis == 'benefit') {
                        $normalized[$alt->alternatif_id][$krit->kriteria_id] = ($v - $min) / ($max - $min);
                    } else { // cost
                        $normalized[$alt->alternatif_id][$krit->kriteria_id] = ($max - $v) / ($max - $min);
                    }
                } else {
                    $normalized[$alt->alternatif_id][$krit->kriteria_id] = 0;
                }
            }
        }

        // Ideal Reference: semua = 1
        $reference = [];
        foreach ($kriterias as $krit) {
            $reference[$krit->kriteria_id] = 1;
        }

        // Hitung delta dan GRC
        $zeta = 0.5;
        $grc = [];
        $deltas = [];

        $allDeltas = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $krit) {
                $val = $normalized[$alt->alternatif_id][$krit->kriteria_id];
                $ref = $reference[$krit->kriteria_id];
                $delta = abs($ref - $val);
                $allDeltas[] = $delta;
            }
        }

        $deltaMin = min($allDeltas);
        $deltaMax = max($allDeltas);

        $grg = [];
        foreach ($alternatifs as $alt) {
            $total = 0;
            foreach ($kriterias as $krit) {
                $val = $normalized[$alt->alternatif_id][$krit->kriteria_id];
                $ref = $reference[$krit->kriteria_id];
                $delta = abs($ref - $val);
                $deltas[$alt->alternatif_id][$krit->kriteria_id] = $delta;

                $grcVal = ($deltaMin + $zeta * $deltaMax) / ($delta + $zeta * $deltaMax);
                $grc[$alt->alternatif_id][$krit->kriteria_id] = $grcVal;

                $total += $grcVal * $krit->weight;
            }

            $grg[] = [
                'alternatif' => $alt,
                'total' => $total,
            ];
        }

        usort($grg, fn($a, $b) => $b['total'] <=> $a['total']);

        $breadcrumb = (object)[
            'title' => 'Rekomendasi Magang',
            'subtitle' => 'Perhitungan Metode GRA'
        ];

        return view('mahasiswa.spk.index', compact(
            'alternatifs',
            'kriterias',
            'matrix',
            'normalized',
            'deltas',
            'grc',
            'grg',
            'breadcrumb'
        ));
    }
}
