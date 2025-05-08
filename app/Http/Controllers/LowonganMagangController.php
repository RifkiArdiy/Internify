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
        $breadcrumb = (object) [
            'title' => 'Lowongan Magang',
            'subtitle' => ['Kelola lowongan magang']
        ];

        $logang = LowonganMagang::all();
        $period = PeriodeMagang::all();

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
            'title' => 'Lowongan Magang',
            'subtitle' => ['Formulir Pengisian Data Lowongan Magang Baru']
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
        //
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

        $breadcrumb = (object) [
            'title' => 'Lowongan Magang',
            'subtitle' => ['Edit Detail Lowongan Magang']
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
