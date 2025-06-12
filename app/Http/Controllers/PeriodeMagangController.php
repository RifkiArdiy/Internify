<?php

namespace App\Http\Controllers;

use App\Models\PeriodeMagang;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
        ]);

        $start = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

        PeriodeMagang::create([
            'name' => $request->name,
            'start_date' => $start,
            'end_date' => $end,
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
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
        ]);

        $start = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

        $pegang = PeriodeMagang::findOrFail($id);
        $pegang->update([
            'name' => $request->name,
            'start_date' => $start,
            'end_date' => $end,
        ]);

        return redirect(route('periode-magang.index'))->with('success', 'Data berhasil diperbarui');
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
