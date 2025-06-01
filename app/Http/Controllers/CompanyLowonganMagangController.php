<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Company;
use App\Models\Kategori;
use App\Models\LowonganMagang;
use App\Models\MagangApplication;
use App\Models\Mahasiswa;
use App\Models\PeriodeMagang;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyLowonganMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_id = Company::where('user_id', Auth::user()->user_id)->value('company_id');
        $logang = LowonganMagang::where('company_id', $company_id)->get();
        $period = PeriodeMagang::all();
        $breadcrumb = (object) [
            'title' => 'Lowongan Magang',
            'subtitle' => 'Jumlah Lowongan Magang : ' . $logang->count()
        ];

        return view('company.lowonganMagang.index', compact('logang', 'period', 'breadcrumb'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [

            'title' => 'Tambah Lowongan Magang',
            'subtitle' => 'Tambah lowongan magang baru'
        ];

        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $periode = PeriodeMagang::all();
        $lowongan = LowonganMagang::all();
        $benefits = Benefit::all();
        $kategoris = Kategori::all();

        return view('company.lowonganMagang.create', compact('provinces', 'periode', 'lowongan', 'benefits', 'kategoris', 'breadcrumb', 'regencies', 'districts', 'villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'period' => 'required|exists:periode_magangs,period_id',
            'kategori' => 'required|exists:kategoris,kategori_id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'regency_id'  => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'village_id'  => 'required|exists:villages,id',

        ]);

        $lowongan = LowonganMagang::create([
            'company_id'   => Company::where('user_id', Auth::user()->user_id)->value('company_id'),
            'period_id'    => $validated['period'],
            'kategori_id'    => $validated['kategori'],
            'title'        => $validated['title'],
            'description'  => $validated['description'],
            'requirements' => $validated['requirements'],
            'province_id' => $validated['province_id'],
            'regency_id'  => $validated['regency_id'],
            'district_id' => $validated['district_id'],
            'village_id'  => $validated['village_id'],
        ]);

        if ($request->has('benefits')) {
            $lowongan->benefits()->attach($request->benefits); // relasi many-to-many
        }

        return redirect()->route('companys-lowongan-magang.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logang = LowonganMagang::with('benefits', 'kategori')->findOrFail($id);
        $period = PeriodeMagang::all();
        $mahasiswa_ids = MagangApplication::where('lowongan_id', $id)->pluck('mahasiswa_id')->toArray();
        $mahasiswas = Mahasiswa::whereIn('mahasiswa_id', $mahasiswa_ids)->get();
        $breadcrumb = (object) [
            'title' => $logang->title,
            'subtitle' => 'Detail lowongan magang'
        ];

        return view('company.lowonganMagang.show', compact('breadcrumb', 'logang', 'period', 'mahasiswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Lowongan Magang',
            'subtitle' => 'Edit lowongan magang'
        ];
        $logang = LowonganMagang::with(['benefits'])->findOrFail($id);
        $provinces = Province::all();
        $benefits = Benefit::all();
        $kategoris = Kategori::all();
        $companies = Company::all();
        $periode = PeriodeMagang::all();
        return view('company.lowonganMagang.edit', compact('logang', 'provinces', 'benefits', 'kategoris', 'companies', 'periode', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logang = LowonganMagang::find($id);
        $request->validate([
            'period' => 'required|integer|exists:periode_magangs,period_id',
            'kategori' => 'required|integer|exists:kategoris,kategori_id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'province_id' => 'required|exists:provinces,id',
            'regency_id'  => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'village_id'  => 'required|exists:villages,id',
        ]);

        $logang->update([
            'period_id' => $request->period,
            'kategori_id' => $request->kategori,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'province_id' => $request->province_id,
            'regency_id'  => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id'  => $request->village_id,
        ]);

        return redirect()->route('companys-lowongan-magang.index')->with('success', 'Lowongan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            LowonganMagang::destroy($id);
            return redirect()->route('companys-lowongan-magang.index')->with('success', 'Data lowongan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('companys-lowongan-magang.index')->with('error', 'Data lowongan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function pelamars(string $id)
    {
        // Get the company ID for the authenticated user
        $companyId = Company::where('user_id', Auth::user()->user_id)->value('company_id');

        // Get all MagangApplication entries for this lowongan and company, eager loading relations
        $magangs = MagangApplication::with(['mahasiswas', 'lowongans'])
            ->whereHas('lowongans', function ($query) use ($companyId, $id) {
                $query->where('company_id', $companyId)
                    ->where('lowongan_id', $id);
            })
            ->get();

        // Build breadcrumb object
        $breadcrumb = (object) [
            'title' => 'Pengajuan Magang',
            'subtitle' => 'Jumlah Pelamar: ' . $magangs->count()
        ];

        return view('company.lowonganMagang.pelamars', compact('magangs', 'breadcrumb'));
    }
}
