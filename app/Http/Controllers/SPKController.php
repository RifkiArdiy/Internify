<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\NilaiAlternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPKController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        // 1. Pastikan bobot kriteria sudah diisi oleh mahasiswa
        $bobotExist = DB::table('kriteria_mahasiswa')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->exists();

        if (!$bobotExist) {
            return redirect()->route('kriteria.bobot.edit')->withErrors('Silakan isi bobot kriteria terlebih dahulu.');
        }

        // 2. Ambil alternatif dan kriteria
        $alternatifs = Alternatif::with(['mahasiswa.user', 'lowongan'])
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->get();

        $kriterias = Kriteria::all();

        // 3. Validasi: Tidak ada alternatif
        if ($alternatifs->isEmpty()) {
            return back()->withErrors('Belum ada alternatif magang untuk dihitung.');
        }

        // 4. Matriks Nilai
        $matrix = [];
        $hasValue = false;
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $krit) {
                $nilai = NilaiAlternatif::where('alternatif_id', $alt->alternatif_id)
                    ->where('kriteria_id', $krit->kriteria_id)
                    ->value('nilai');

                if ($nilai !== null) {
                    $hasValue = true;
                }

                $matrix[$alt->alternatif_id][$krit->kriteria_id] = $nilai ?? 0;
            }
        }

        // // 5. Validasi: Tidak ada nilai sama sekali
        if (!$hasValue) {
            return back()->withErrors('Nilai alternatif belum diinputkan. Silakan input terlebih dahulu.');
        }

        // 6. Normalisasi min-max
        $normalized = [];
        foreach ($kriterias as $krit) {
            $values = array_column($matrix, $krit->kriteria_id);

            if (empty($values)) {
                foreach ($alternatifs as $alt) {
                    $normalized[$alt->alternatif_id][$krit->kriteria_id] = 0;
                }
                continue;
            }

            $min = min($values);
            $max = max($values);

            foreach ($alternatifs as $alt) {
                $v = $matrix[$alt->alternatif_id][$krit->kriteria_id];
                if ($max != $min) {
                    $normalized[$alt->alternatif_id][$krit->kriteria_id] = $krit->jenis == 'benefit'
                        ? ($v - $min) / ($max - $min)
                        : ($max - $v) / ($max - $min);
                } else {
                    $normalized[$alt->alternatif_id][$krit->kriteria_id] = 0;
                }
            }
        }

        // 7. Ideal Reference (semua 1)
        $reference = [];
        foreach ($kriterias as $krit) {
            $reference[$krit->kriteria_id] = 1;
        }

        // 8. Deviation Sequence dan GRC
        $zeta = 0.5;
        $deltas = [];
        $grc = [];
        $allDeltas = [];

        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $krit) {
                $val = $normalized[$alt->alternatif_id][$krit->kriteria_id];
                $ref = $reference[$krit->kriteria_id];
                $delta = abs($ref - $val);
                $deltas[$alt->alternatif_id][$krit->kriteria_id] = $delta;
                $allDeltas[] = $delta;
            }
        }

        // 9. Validasi: Pastikan ada delta
        if (empty($allDeltas)) {
            return back()->withErrors('Gagal menghitung GRC: tidak ditemukan nilai deviasi.');
        }

        $deltaMin = min($allDeltas);
        $deltaMax = max($allDeltas);

        // 10. GRG Calculation
        $grg = [];
        foreach ($alternatifs as $alt) {
            $total = 0;

            foreach ($kriterias as $krit) {
                $delta = $deltas[$alt->alternatif_id][$krit->kriteria_id];
                $grcVal = ($deltaMin + $zeta * $deltaMax) / ($delta + $zeta * $deltaMax);
                $grc[$alt->alternatif_id][$krit->kriteria_id] = $grcVal;

                $bobot = DB::table('kriteria_mahasiswa')
                    ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
                    ->where('kriteria_id', $krit->kriteria_id)
                    ->value('weight') ?? 0;

                $total += $grcVal * $bobot;
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
            'breadcrumb',
            'alternatifs',
            'kriterias',
            'matrix',
            'normalized',
            'deltas',
            'grc',
            'grg'
        ));
    }
}
