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
        return view('periodeMagang.index', compact('pegang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periodeMagang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PeriodeMagang::create([
            'name' => $request->name,
            'start_date' => $request->masaAwal,
            'end_date' => $request->masaAkhir,
        ]);

        return redirect()->route('periodeMagang.index')->with('success', 'Data periode diperbarui.');
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
        $pegang = PeriodeMagang::find($id);
        return view('periodeMagang.edit', compact('pegang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegang = PeriodeMagang::find($id);
        $pegang->update([
            'name' => $request->name,
            'start_date' => $request->masaAwal,
            'end_date' => $request->masaAkhir,
        ]);

        return redirect()->route('periodeMagang.index')->with('success', 'Data periode diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegang = PeriodeMagang::findOrFail($id);
        $pegang->delete();

        return redirect()->route('periodeMagang.index')->with('success', 'Periode berhasil dihapus.');

    }
}
