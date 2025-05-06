<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = ProgramStudi::all();

        return view('prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProgramStudi::create([
            'name' => $request->name
        ]);

        return redirect('/prodi/');

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
        $prodi = ProgramStudi::find($id);

        return view('prodi.edit', compact('prodi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = ProgramStudi::find($id);

        $level->update([
            'name' => $request->name
        ]);

        return redirect('/prodi/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ProgramStudi::destroy($id);
            return redirect('/prodi')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/prodi')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
