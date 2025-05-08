<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Laravel\Prompts\alert;

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
        return view('auth.register');
    }

    public function postRegister(Request $request) {
        $rules = [
            // 'level_id' => 'required|exists:m_level,level_id',
            'username' => 'required|string|unique:users,username',
            'name' => 'required|string|max:100',
            'password' => 'required|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return alert('Validasi gagal');
        }

        $newUser = User::create([
            'level_id' => 2,
            'username' => $request->username,
            'email' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        Mahasiswa::create([
            'user_id' => $newUser->user_id,
            'prodi_id' => null,
            'nim' => null,
            'no_telp' => null,
            'alamat' => null
        ]);

        return redirect('/login');


    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (
            // Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']]) ||
            Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])
        ) {

            $user = Auth::user();

            if ($user->level->level_nama === 'Administrator') {
                return response()->json([
                    'message' => 'Login berhasil sebagai Admin',
                    'redirect' => route('admin.dashboard')
                ]);
            } elseif ($user->level->level_nama === 'Dosen') {
                return response()->json([
                    'message' => 'Login berhasil sebagai Dosen',
                    'redirect' => route('dosen.dashboard')
                ]);
            } elseif ($user->level->level_nama === 'Mahasiswa') {
                return response()->json([
                    'message' => 'Login berhasil sebagai Mahasiswa',
                    'redirect' => route('mahasiswa.dashboard')
                ]);
            } else {
                Auth::logout();
                return response()->json([
                    'message' => 'Level pengguna tidak dikenali!',
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'Email/Username atau Password salah!',
            ], 401);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
