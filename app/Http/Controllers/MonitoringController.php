<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class MonitoringController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $jumlahMahasiswaMagang = $mahasiswas->where('status', 'is_magang')->count();
        $jumlahDosenPembimbing = $dosens->count();
        $rasio = $jumlahMahasiswaMagang / $jumlahDosenPembimbing;
        $breadcrumb = (object) [
            'title' => 'Monitoring',
            'subtitle' => 'Halaman untuk memantau proses magang mahasiswa'
        ];
        return view('admin.monitoring.index', compact('breadcrumb', 'mahasiswas', 'dosens', 'rasio', 'jumlahMahasiswaMagang', 'jumlahDosenPembimbing'));
    }
}
