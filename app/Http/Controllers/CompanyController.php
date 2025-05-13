<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Company',
            'subtitle' => ['Jumlah Perusahaan Mitra : ' . $companies->count()]
        ];
        return view('admin.company.index', compact('companies', 'breadcrumb'));
    }

    public function indexVerifikasi()
    {
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Verifikasi Perusahaan Mitra',
            'subtitle' => ['Jumlah Perusahaan Mitra : ' . $companies->count()]
        ];
        return view('company.verifikasi', compact('companies', 'breadcrumb'));
    }

    public function create()
    {
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Perusahaan Mitra',
            'subtitle' => ['Formulir Pengisian Data Mitra Baru']
        ];
        return view('admin.company.create', compact('companies', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'industry' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = [
            'level_id' => 4, // Company
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/users', $imageName);
            $userData['image'] = $imageName;
        }

        $user = User::create($userData);

        Company::create([
            'user_id' => $user->user_id,
            'industry' => $request->industry,
        ]);

        return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Edit Perusahaan Mitra',
            'subtitle' => ['Edit Detail Mitra']
        ];
        return view('admin.company.edit', compact('company', 'breadcrumb'));
    }

    public function update(Request $request, string $id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|unique:users,email,' . $user->user_id . ',user_id',
            'industry' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/images/users/' . $user->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/users', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        $company->update([
            'industry' => $request->industry,
        ]);

        return redirect()->route('companies.index')->with('success', 'Data perusahaan diperbarui.');
    }

    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->user->delete();
        $company->delete();

        try {
            Company::destroy($id);
            return redirect()->route('companies.index')->with('success', 'Company ' . $company->user->name . ' berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('companies.index')->with('error', 'Company ' . $company->user->name . ' gagal dihapus karena masih digunakan');
        }
    }
}
