<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('guest.index');
    }
}
