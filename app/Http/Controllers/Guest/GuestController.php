<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use Auth;
use Hash;

class GuestController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('guest.dashboard');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'required' => 'Wajib diisi'
        ]);

        $user = User::where('username', $validated['username'])->roleMember()->first();
        if ( !$user) return redirect()->back()->with('invalid', 'Username atau password salah');
        if( !Hash::check($validated['password'], $user->password)) return redirect()->back()->with('invalid', 'Username atau password salah');

        Auth::loginUsingId($user->id);
        return redirect()->route('guest.home');
    }

    public function indexNews(Request $request)
    {
        $news = News::withCount('comments')->with(['category', 'author'])
                    ->orderBy('id', 'DESC')
                    ->published()
                    ->paginate(10);

        $param['news'] = $news;

        return view('guest.news.index', $param);
    }

    public function detailNews(Request $request, $slug)
    {
        $news = News::with('comments.user', 'category', 'author')
                ->where('slug', $slug)
                ->first();



        $param['news'] = $news;
        return view('guest.news.detail', $param);
    }
}
