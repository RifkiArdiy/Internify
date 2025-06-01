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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logang = LowonganMagang::with('company')->get();
        // $companies = Company::all();
        $period = PeriodeMagang::all();
        $breadcrumb = (object) [
            'title' => 'Lowongan Magang',
            'subtitle' => 'Jumlah Lowongan Magang : ' . $logang->count()
        ];


        return view('admin.lowonganMagang.index', compact('logang', 'period', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [

            'title' => 'Tambah Lowongan Magang',
            'subtitle' => 'Tambah lowongan magang'
        ];

        $provinces = Province::all();
        $companies = Company::all();
        $periode = PeriodeMagang::all();
        $lowongan = LowonganMagang::all();
        $benefits = Benefit::all();
        $kategoris = Kategori::all();

        return view('admin.lowonganMagang.create', compact('provinces', 'companies', 'periode', 'lowongan', 'benefits', 'kategoris', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|exists:companies,company_id',
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
            'company_id'   => $validated['company'],
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

        return redirect()->route('lowongan-magang.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logang = LowonganMagang::with('benefits', 'kategori')->findOrFail($id);
        $period = PeriodeMagang::all();
        $breadcrumb = (object) [
            'title' => $logang->title,
            'subtitle' => 'Detail lowongan magang'
        ];

        return view('admin.lowonganMagang.show', compact('breadcrumb', 'logang', 'period'));
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
        return view('admin.lowonganMagang.edit', compact('logang', 'provinces', 'benefits', 'kategoris', 'companies', 'periode', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logang = LowonganMagang::find($id);
        $request->validate([
            'company' => 'required|integer|exists:companies,company_id',
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
            'company_id' => $request->company,
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

        return redirect()->route('lowongan-magang.index')->with('success', 'Lowongan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            LowonganMagang::destroy($id);
            return redirect()->route('lowongan-magang.index')->with('success', 'Data lowongan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('lowongan-magang.index')->with('error', 'Data lowongan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
