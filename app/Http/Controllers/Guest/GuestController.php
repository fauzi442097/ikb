<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

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
