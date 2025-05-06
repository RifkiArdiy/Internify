<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagangApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id = Auth::user()->user_id;
        // $m_id = Mahasiswa::get('mahasiswa_id')->where('user_id', $id);
        // $magangs = MagangApplication::where('mahasiswa_id', $m_id);
        $magangs = MagangApplication::all();
        return view('magangApplication.index', compact('magangs'));
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
        //
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
