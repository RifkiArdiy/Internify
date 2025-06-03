<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function register()
    {

        $prodis = ProgramStudi::all();
        return view('auth.register', compact('prodis'));
    }

    // public function postLogin(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');

    //     if (
    //         Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']]) ||
    //         Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])
    //     ) {

    //         $user = Auth::user();

    //         if ($user->level->level_nama === 'Administrator') {
    //             return response()->json([
    //                 'message' => 'Login berhasil sebagai Admin',
    //                 'redirect' => route('admin.dashboard')
    //             ]);
    //         } elseif ($user->level->level_nama === 'Dosen') {
    //             return response()->json([
    //                 'message' => 'Login berhasil sebagai Dosen',
    //                 'redirect' => route('dosen.dashboard')
    //             ]);
    //         } elseif ($user->level->level_nama === 'Mahasiswa') {
    //             return response()->json([
    //                 'message' => 'Login berhasil sebagai Mahasiswa',
    //                 'redirect' => route('welcome.index')
    //             ]);
    //         } elseif ($user->level->level_nama === 'Company') {
    //             return response()->json([
    //                 'message' => 'Login berhasil sebagai Perusahaan Mitra',
    //                 'redirect' => route('company.dashboard')
    //             ]);
    //         } else {
    //             Auth::logout();
    //             return response()->json([
    //                 'message' => 'Level pengguna tidak dikenali!',
    //             ], 403);
    //         }
    //     } else {
    //         return response()->json([
    //             'message' => 'Email/Username atau Password salah!',
    //         ], 401);
    //     }
    // }
    protected function redirectBasedOnRole()
    {
        $user = Auth::user();

        switch ($user->level->level_nama) {
            case 'Administrator':
                return response()->json([
                    'message' => 'Login berhasil sebagai Admin',
                    'redirect' => route('admin.dashboard')
                ]);
            case 'Dosen':
                return response()->json([
                    'message' => 'Login berhasil sebagai Dosen',
                    'redirect' => route('dosen.dashboard')
                ]);
            case 'Mahasiswa':
                return response()->json([
                    'message' => 'Login berhasil sebagai Mahasiswa',
                    'redirect' => route('mahasiswa.dashboard')
                ]);
            case 'Company':
                return response()->json([
                    'message' => 'Login berhasil sebagai Perusahaan Mitra',
                    'redirect' => route('company.dashboard')
                ]);
            default:
                Auth::logout();
                return response()->json([
                    'message' => 'Level pengguna tidak dikenali!',
                ], 403);
        }
    }


    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // 1. Coba login via email
        if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
            return $this->redirectBasedOnRole();
        }

        // 2. Coba login via username
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return $this->redirectBasedOnRole();
        }

        // 3. Coba login via NIM dari relasi mahasiswa
        $mahasiswa = \App\Models\Mahasiswa::where('nim', $credentials['username'])->first();
        if ($mahasiswa && $mahasiswa->user && Hash::check($credentials['password'], $mahasiswa->user->password)) {
            Auth::login($mahasiswa->user); // force login
            return $this->redirectBasedOnRole();
        }

        $dosen = \App\Models\Dosen::where('nip', $credentials['username'])->first();
        if ($dosen && $dosen->user && Hash::check($credentials['password'], $dosen->user->password)) {
            Auth::login($dosen->user); // force login
            return $this->redirectBasedOnRole();
        }

        // Jika semua gagal
        return response()->json([
            'message' => 'Email/Username/NIM atau Password salah!',
        ], 401);
    }


    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'nim' => 'required|min:10|unique:mahasiswas',
            'prodi_id' => 'required|integer'
        ]);

        $user = User::create([
            'level_id' => 2,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mahasiswa::create([
            'user_id' => $user->user_id,
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
        ]);
        return redirect()->route('login')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}
