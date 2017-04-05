<?php

namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.template.admin');
    }

    public function dashboard()
    {
        return view('admin.template.partials.dashboard');
    }
}
