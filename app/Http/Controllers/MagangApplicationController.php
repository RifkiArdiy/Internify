<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Company;
use App\Models\LowonganMagang;
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
        $companyId = Company::where('user_id', Auth::user()->user_id)->value('company_id');
        $magangs = MagangApplication::with(['mahasiswas', 'lowongans'])
            ->whereHas('lowongans', function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->get();
        $breadcrumb = (object) [
            'title' => 'Pengajuan Magang',
            'subtitle' => 'Jumlah Pelamar : ' . $magangs->count()
        ];

        return view('company.lamaranMagang.index', compact('magangs', 'breadcrumb'));
    }

    public function indexMhs()
    {
        $breadcrumb = (object) [
            'title' => 'Lamaran Magang',
            'subtitle' => 'Review lamaran magang anda'
        ];

        $logangs = LowonganMagang::all();
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();

        if ($mahasiswa) {
            $magangs = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->get();
        } else {
            $magangs = collect(); // or handle error appropriately
        }

        return view('mahasiswa.pengajuanMagang.index', compact('magangs', 'breadcrumb', 'logangs'));
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
    // public function store($id)
    // {
    //     $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
    //     if (!$mahasiswa) {
    //         return redirect()->back()->with('error', 'Silakan login terlebih dahulu.');
    //     }

    //     // Cek apakah user punya role mahasiswa (opsional tapi disarankan)
    //     if ($mahasiswa->user->level->level_nama !== 'Mahasiswa') {
    //         return redirect()->back()->with('error', 'Hanya mahasiswa yang dapat melamar.');
    //     }


    //     // Cek apakah sudah pernah melamar untuk lowongan ini
    //     $existingApplication = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
    //         ->where('lowongan_id', $id)
    //         ->first();

    //     if ($existingApplication) {
    //         return redirect(route('lamaran'))->with('error', 'Anda sudah melamar untuk lowongan ini.');
    //     }

    //     // Jika belum ada, buat lamaran baru
    //     MagangApplication::create([
    //         'mahasiswa_id' => $mahasiswa->mahasiswa_id,
    //         'lowongan_id' => $id,
    //         'status' => 'Pending',
    //     ]);

    //     return redirect(route('lamaran'))->with('success', 'Lamaran berhasil dikirim.');
    // }

    public function store($id)
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();

        if (!$mahasiswa) {
            $message = 'Silakan login terlebih dahulu.';
            return request()->ajax()
                ? response()->json(['success' => false, 'message' => $message], 401)
                : redirect()->back()->with('error', $message);
        }

        // Opsional: Validasi role
        if ($mahasiswa->user->level->level_nama !== 'Mahasiswa') {
            $message = 'Hanya mahasiswa yang dapat melamar.';
            return request()->ajax()
                ? response()->json(['success' => false, 'message' => $message], 403)
                : redirect()->back()->with('error', $message);
        }

        $existingApplication = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
            ->where('lowongan_id', $id)
            ->first();

        if ($existingApplication) {
            $message = 'Anda sudah melamar untuk lowongan ini.';
            return request()->ajax()
                ? response()->json(['success' => false, 'message' => $message], 409)
                : redirect(route('lamaran'))->with('error', $message);
        }

        MagangApplication::create([
            'mahasiswa_id' => $mahasiswa->mahasiswa_id,
            'lowongan_id' => $id,
            'status' => 'Pending',
        ]);

        $message = 'Lamaran berhasil dikirim.';
        return request()->ajax()
            ? response()->json(['success' => true, 'message' => $message])
            : redirect(route('lamaran'))->with('success', $message);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $magang = MagangApplication::findOrFail($id);

        $profilAkademik = $magang->mahasiswas->user->profilAkademik;

        $breadcrumb = (object) [
            'title' => 'Detail Lamaran',
            'subtitle' => 'Lamaran ' . $magang->mahasiswas->user->name
        ];

        return view('company.lamaranMagang.show', compact('breadcrumb', 'magang', 'profilAkademik'));
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

        if ($request->status === 'Disetujui') {
            Mahasiswa::where('mahasiswa_id', $lamaran->mahasiswa_id)
                ->update(['status' => 'is_magang']);
        } //elseif($request->status === 'Selesai') {
        //     Mahasiswa::where('mahasiswa_id', $lamaran->mahasiswa_id)
        //         ->update(['status' => 'selesai_magang']);
        // }

        return redirect()->back()->with('success', 'Pengajuan magang telah direview');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $lamaran = MagangApplication::findOrFail($id);
            $lamaran->delete();

            return response()->json([
                'success' => true,
                'message' => 'Lamaran berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus lamaran.'
            ], 500);
        }
    }
}
