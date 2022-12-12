<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
//        dump(Auth::user()->id);
//        dd(Auth()->user()->email);
        return view('admin.index');
    }
}
