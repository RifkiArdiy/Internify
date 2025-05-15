<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LowonganMagang;
use App\Models\PeriodeMagang;
use Illuminate\Http\Request;

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
            'subtitle' => ['Jumlah Lowongan Magang : ' . $logang->count()]
        ];


        return view('admin.lowonganMagang.index', compact('logang', 'period', 'breadcrumb'));
    }

    public function indexMhs()
    {
        $breadcrumb = (object) [
            'title' => 'Lowongan Magang',
            'subtitle' => ['Cari lowongan magang']
        ];

        $logang = LowonganMagang::all();
        $period = PeriodeMagang::all();

        return view('admin.lowonganMagang.indexMhs', compact('logang', 'period', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [

            'title' => 'Tambah Lowongan Magang',
            'subtitle' => ['Tambah lowongan magang baru']
        ];

        $companies = Company::all();
        $periode = PeriodeMagang::all();
        $lowongan = LowonganMagang::all();
        return view('admin.lowonganMagang.create', compact('companies', 'periode', 'lowongan', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|exists:companies,company_id',
            'period' => 'required|exists:periode_magangs,period_id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        LowonganMagang::create([
            'company_id'   => $validated['company'],
            'period_id'    => $validated['period'],
            'title'        => $validated['title'],
            'description'  => $validated['description'],
            'requirements' => $validated['requirements'],
            'location'     => $validated['location'],
        ]);

        return redirect()->route('lowonganMagang.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logang = LowonganMagang::find($id);
        $period = PeriodeMagang::all();
        $breadcrumb = (object) [
            'title' => $logang->title,
            'subtitle' => ['Detail lowongan magang']
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
            'subtitle' => ['Edit lowongan magang']
        ];

        $companies = Company::all();
        $periode = PeriodeMagang::all();
        $logang = LowonganMagang::find($id);
        return view('admin.lowonganMagang.edit', compact('logang', 'companies', 'periode', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logang = LowonganMagang::find($id);
        $validated = $request->validate([
            'company' => 'required|integer|exists:companies,company_id',
            'period' => 'required|integer|exists:periode_magangs,period_id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'required|string|max:255',
        ]);

        $logang->update([
            'company_id' => $request->company,
            'period_id' => $request->period,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'location' => $request->location,
        ]);

        return redirect()->route('lowonganMagang.index')->with('success', 'Lowongan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            LowonganMagang::destroy($id);
            return redirect()->route('lowonganMagang.index')->with('success', 'Data lowongan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('lowonganMagang.index')->with('error', 'Data lowongan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
