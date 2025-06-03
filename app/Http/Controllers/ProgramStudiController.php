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
        $prodi = ProgramStudi::with(['mahasiswas' => function ($query) {
            $query->whereHas('user', function ($userQuery) {
                $userQuery->where('level_id', 2); // Asumsi level_id 2 untuk mahasiswa
            });
        }])->get();
        $breadcrumb = (object) [
            'title' => 'Program Studi',
            'subtitle' => 'Jumlah Program Studi : ' . $prodi->count()
        ];
        return view('admin.prodi.index', compact('prodi', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Program Studi',
            'subtitle' => 'Formulir Pengisian Data Program Studi Baru'
        ];
        return view('admin.prodi.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProgramStudi::create([
            'name' => $request->name
        ]);

        return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil ditambahkan');
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
        $breadcrumb = (object) [
            'title' => 'Edit Program Studi',
            'subtitle' => 'Edit Detail Program Studi'
        ];
        return view('admin.prodi.edit', compact('prodi', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prodi = ProgramStudi::find($id);
        $prodi->update([
            'name' => $request->name
        ]);

        return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ProgramStudi::destroy($id);
            return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('prodi.index')->with('error', 'Data program studi gagal dihapus karena masih digunakan');
        }
    }
}
