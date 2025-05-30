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

        // Ambil data mahasiswa yang sedang login
        $mahasiswa = $user->mahasiswa;

        // Ambil hanya alternatif milik mahasiswa yang sedang login
        $alternatifs = Alternatif::with('mahasiswa.user', 'lowongan')
            ->where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->get();

        $kriterias = Kriteria::all();

        // Buat matriks nilai awal
        $matrix = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $krit) {
                $nilai = NilaiAlternatif::where('alternatif_id', $alt->alternatif_id)
                    ->where('kriteria_id', $krit->kriteria_id)
                    ->value('nilai') ?? 0;
                $matrix[$alt->alternatif_id][$krit->kriteria_id] = $nilai;
            }
        }

        // Normalisasi nilai
        // $normal = [];
        // foreach ($kriterias as $krit) {
        //     $col = array_column($matrix, $krit->kriteria_id);

        //     $max = max($col);
        //     $min = min($col);

        //     foreach ($alternatifs as $alt) {
        //         $value = $matrix[$alt->alternatif_id][$krit->kriteria_id];
        //         if ($krit->jenis == 'benefit') {
        //             $normal[$alt->alternatif_id][$krit->kriteria_id] = $max > 0 ? $value / $max : 0;
        //         } else { // cost
        //             $normal[$alt->alternatif_id][$krit->kriteria_id] = $value > 0 ? $min / $value : 0;
        //         }
        //     }
        // }
        // Normalisasi nilai
        $normal = [];
        foreach ($kriterias as $krit) {
            $col = array_column($matrix, $krit->kriteria_id);

            if (empty($col)) {
                continue; // lewati kriteria ini jika tidak ada datanya
            }

            $max = max($col);
            $min = min($col);

            foreach ($alternatifs as $alt) {
                $value = $matrix[$alt->alternatif_id][$krit->kriteria_id] ?? 0;
                if ($krit->jenis == 'benefit') {
                    $normal[$alt->alternatif_id][$krit->kriteria_id] = $max > 0 ? $value / $max : 0;
                } else {
                    $normal[$alt->alternatif_id][$krit->kriteria_id] = $value > 0 ? $min / $value : 0;
                }
            }
        }


        // Hitung total skor akhir
        $results = [];
        foreach ($alternatifs as $alt) {
            $total = 0;
            foreach ($kriterias as $krit) {
                $total += $normal[$alt->alternatif_id][$krit->kriteria_id] * $krit->weight;
            }
            $results[] = [
                'alternatif' => $alt,
                'total' => $total,
            ];
        }

        // Urutkan dari skor tertinggi
        usort($results, fn($a, $b) => $b['total'] <=> $a['total']);

        $breadcrumb = (object) [
            'title' => 'Rekomendasi Magang',
            'subtitle' => ['Tabel Rekomendasi']
        ];

        return view('mahasiswa.spk.index', compact('results', 'kriterias', 'alternatifs', 'matrix', 'normal', 'breadcrumb'));
    }
}
