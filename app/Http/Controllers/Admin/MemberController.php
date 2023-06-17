<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    public function index(Request $request)
    {
        $param = [];
        return view('admin.member.index', $param);
    }
}
