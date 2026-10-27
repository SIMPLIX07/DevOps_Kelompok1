<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Hash;

class AuthPelamarController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $pelamar = Pelamar::where('username', $request->username)->first();

        if (!$pelamar || !Hash::check($request->password, $pelamar->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau password salah'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil'
        ]);
    }
}
