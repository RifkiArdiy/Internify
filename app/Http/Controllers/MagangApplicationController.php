<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MagangApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magangs = MagangApplication::all();
        $breadcrumb = (object) [
            'title' => 'Lamaran Magang',
            'subtitle' => ['Jumlah Pelamar : ' . $magangs->count()]
        ];

        return view('magangApplication.index', compact('magangs', 'breadcrumb'));
    }
    public function indexMhs()
    {
        $breadcrumb = (object) [
            'title' => 'Lamaran Magang',
            'subtitle' => ['Review lamaran magang anda']
        ];

        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();

        if ($mahasiswa) {
            $magangs = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->get();
        } else {
            $magangs = collect(); // or handle error appropriately
        }
        
        return view('magangApplication.indexMhs', compact('magangs', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
    
        // Cek apakah sudah pernah melamar untuk lowongan ini
        $existingApplication = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('lowongan_id', $request->lowongan_id)
            ->first();
    
        if ($existingApplication) {
            return redirect(route('lamaran'))->with('error', 'Anda sudah melamar untuk lowongan ini.');
        }
    
        // Jika belum ada, buat lamaran baru
        MagangApplication::create([
            'mahasiswa_id' => $mahasiswa->mahasiswa_id,
            'lowongan_id' => $request->lowongan_id,
            'status' => 'Pending',
        ]);
    
        return redirect(route('lamaran'))->with('success', 'Lamaran berhasil dikirim.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lamaran = MagangApplication::find($id);

        $lamaran->update([
            'status' => $request->status
        ]);

        return redirect('admin/magangApplication');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            MagangApplication::destroy($id);
            return redirect('/mahasiswa/lamaran')->with('success', 'Data lamaran berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/mahasiswa/lamaran')->with('error', 'Data lamaran gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}