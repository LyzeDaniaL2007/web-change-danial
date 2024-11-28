<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'user_id' => $id,
            'user_nama' => $request->input('nama'),
            'user_alamat' => $request->input('alamat'),
            'user_username' => $request->input('username'),
            'user_email' => $request->input('email'),
            'user_notelp' => $request->input('notelp'),
            'user_password' => bcrypt($request->input('password'))
        ];

        $user = User::register($data);

        if ($user) {
            return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil!');
        } else {
            return back()->withInput();
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'user_username' => $request->input('user_username'),
            'user_password' => $request->input('user_password')
        ];

        // Log the session ID before login
        Log::info('Session ID before login: ' . session()->getId());

        $user = User::where('user_username', $credentials['user_username'])->first();
        if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
            Auth::login($user);

            // Log the session ID after login
            Log::info('Session ID after login: ' . session()->getId());
            Log::info('User ID after login: ' . Auth::id());
            if ($user->user_level === 'admin') {
                return redirect('/dashboardadmin');
            }

            return redirect('/dashboardsiswa');
        } else {
            return back()->withErrors([
                'message' => 'Username atau password Anda salah.',
            ]);
        }
    }


    public function upload_profile(Request $request, $id)
    {
        if ($request->hasFile('profile')) {
            $data = $request->file('profile');

            User::upload_profile($id, $data);

            return redirect()->route('pengaturan')->with('success', 'foto profil berhasil diperbarui');
        }

        return back()->with('failed', 'foto profil gagal diperbarui!');
    }
}
