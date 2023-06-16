<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Member;
use Auth;
use Hash;
use Log;
use DB;

class GuestController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $param['member'] = Member::where('user_id', auth()->user()->id)->first();
        return view('guest.dashboard', $param);
    }

    public function indexFillDataMember(Request $request)
    {
        $members = Member::leftJoin('users', 'users.id', 'members.user_id')
                    ->where('users.id', auth()->user()->id)
                    ->first();

        $type = isset($request->type) ? $request->type : null;
        $urlBack = $type == null ? route('guest.home') : route('guest.profile');

        $param['member'] = $members;
        $param['type'] = $type;
        $param['urlBack'] = $urlBack;
        return view('guest.fill_data_member', $param);
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('guest.login');
    }

    public function register(Request $request)
    {

        $arrData = $request->all();
        $request->validate([
            'name' => 'required|max:100',
            'phone_no' => 'nullable|digits_between:10,15|numeric',
            'username' =>  'required|min:3|max:30|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|min:5|max:30'
        ],  [
            'required' => 'Wajib diisi',
            'max' => 'Maksimal diisi :max karakter',
            'digits_between' => 'Minimal diisi :min sampai :max digit angka',
            'min' => 'Minimal diisi :min karakter',
            'email' => 'Format email tidak valid',
            'unique' => 'Username sudah digunakan',
            'numeric' => 'Hanya boleh diisi angka'
        ]);

        DB::beginTransaction();
        try {
            $now = date('Y-m-d H:i:s');
            $userCreated = User::create([
                'name' => $arrData['name'],
                'email' => $arrData['email'],
                'email_verified_at' => $now,
                'password' => bcrypt($arrData['password']),
                'username' => $arrData['username'],
                'role_id' => 2,
                'created_at' => $now,
            ]);

            $userCreated->member()->create([
                'name' => $arrData['name'],
                'phone_no' => $arrData['phone_no'],
                'created_at' => $now
            ]);

            Auth::loginUsingId($userCreated->id);
            DB::commit();

            return redirect()->route('guest.home')->with('success', "Selamat Anda telah tergabung sebagai member IKB. Silakan lengkapi data keanggotaan Anda");
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->back()->with('invalid', 'Terjadi kesalahan pada server');
        }
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
        $param['slug'] = $slug;
        return view('guest.news.detail', $param);
    }

    public function profile(Request $request)
    {
        $param = [];
        return view('guest.profile', $param);
    }
}
