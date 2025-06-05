<?php

namespace App\Http\Controllers;

use App\Models\Log;
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
            'subtitle' => 'Jumlah Perusahaan Mitra : ' . $companies->count()
        ];
        return view('admin.company.index', compact('companies', 'breadcrumb'));
    }

    public function indexVerifikasi()
    {
        $companies = auth()->user()->company;

        $logs = Log::with(['mahasiswa.user', 'companies.user'])
            ->where('company_id', $companies->company_id) // filter laporan
            ->latest()
            ->get();

        $breadcrumb = (object) [
            'title' => 'Verifikasi Laporan Mahasiswa',
            'subtitle' => 'Laporan Harian'
        ];
        return view('company.verifikasi', compact('breadcrumb', 'logs'));
    }

    public function updateVerifikasi(Request $request, string $id)
    {
        $logs = Log::find($id);

        $logs->update([
            'verif_company' => $request->verif_company,
        ]);

        return redirect('company/verifikasi')->with('success', 'Laporan berhasil diverifikasi');
    }

    public function showLaporan($id)
    {
        $log = Log::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Laporan',
            'subtitle' => 'Detail Laporan Magang'
        ];
        return view('company.show', compact('breadcrumb', 'log'));
    }

    public function create()
    {
        $companies = Company::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Perusahaan Mitra',
            'subtitle' => 'Formulir Pengisian Data Mitra Baru'
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
            'about_company' => 'required|string|max:65535',
            'no_telp' => 'nullable|string|min:10|max:15',
            'alamat' => 'nullable|string|min:10|max:100',
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
            'about_company' => $request->about_company,
        ]);

        return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Edit Perusahaan Mitra',
            'subtitle' => 'Edit Detail Mitra'
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
            'about_company' => 'required|string|max:65535',
            'alamat' => 'nullable|max:100',
            'no_telp' => 'nullable|max:15',
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
            'about_company' => $request->about_company,
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

    public function show(string $id)
    {
        $comp = Company::find($id);
        $breadcrumb = (object) [
            'title' => $comp->user->name,
            'subtitle' => 'Detail Perusahaan'
        ];

        return view('admin.company.show', compact('breadcrumb', 'comp'));
    }
}
