<?php

namespace App\Http\Controllers;

use App\Models\PeriodeMagang;
use Illuminate\Http\Request;

class PeriodeMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegang = PeriodeMagang::all();
        $breadcrumb = (object) [
            'title' => 'Periode Magang',
            'subtitle' => 'Jumlah Periode Magang : ' . $pegang->count()
        ];

        $pegang = PeriodeMagang::all();
        return view('admin.periodeMagang.index', compact('pegang', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Periode Magang',
            'subtitle' => 'Formulir Pengisian Data Periode Magang Baru'
        ];

        return view('admin.periodeMagang.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PeriodeMagang::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect(route('periode-magang.index'))->with('success', 'Periode berhasil ditambahkan');
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
            'title' => 'Edit Periode Magang',
            'subtitle' => 'Perbarui Detail Periode Magang'
        ];

        $pegang = PeriodeMagang::find($id);
        return view('admin.periodeMagang.edit', compact('pegang', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegang = PeriodeMagang::find($id);
        $pegang->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect(route('periode-magang.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegang = PeriodeMagang::find($id);
        $pegang->delete();

        return redirect(route('periode-magang.index'))->with('success', 'Periode berhasil dihapus');
    }
}
