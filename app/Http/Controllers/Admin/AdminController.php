<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth, Hash;

class AdminController extends Controller
{
    //

    public function indexLogin(Request $request)
    {
        if ( auth()->check() ) return redirect()->route('admin.home');
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:5'
        ], [
            'required' => 'Wajib diisi',
            'password.min' => 'Password minimal diisi :min karakter'
        ]);


        $user = User::where('username', $validated['username'])->first();

        if ( !$user) return redirect()->back()->with('invalid', 'Username atau password salah');
        if( !Hash::check($validated['password'], $user->password)) return redirect()->back()->with('invalid', 'Username atau password salah');

        Auth::loginUsingId($user->id);
        return redirect()->route('admin.home');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.index_login');
    }

    public function home(Request $request)
    {
        return view('admin.dashboard');
    }
}
