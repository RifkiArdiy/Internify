<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbinganController extends Controller
{
    //
    public function index()
    {
        $dosen = Dosen::where('user_id', Auth::id())->firstOrFail();
        $mahasiswas = $dosen->mahasiswas()->with(['user', 'prodi', 'manajemenBimbingan'])->get();

        // Ubah menjadi object stdClass agar bisa diakses dengan -> 
        $breadcrumb = (object)[
            'title' => 'Manajemen Bimbingan',
            'subtitle' => 'Daftar Mahasiswa Bimbingan'
        ];

        return view('dosen.bimbingan.index', compact('mahasiswas', 'breadcrumb'));
    }
}
