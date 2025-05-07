<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Company',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('company.index', compact('companies', 'breadcrumb'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Perusahaan Mitra',
            'subtitle' => ['Form Validation']
        ];
        return view('company.create', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        Company::create([
            'name' => $request->name,
            'industry' => $request->industry,
            'address' => $request->address,
            'contact' => $request->contact,
        ]);

        return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Edit Perusahaan Mitra',
            'subtitle' => ['Form Validation']
        ];
        return view('company.edit', compact('company', 'breadcrumb'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $company = Company::findOrFail($id);
        $company->update([
            'name' => $request->name,
            'industry' => $request->industry,
            'address' => $request->address,
            'contact' => $request->contact,
        ]);

        return redirect()->route('companies.index')->with('success', 'Data perusahaan diperbarui.');
    }

    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
