<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contador;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.layouts.permisos');
    }
    
    public function banner()
    {
        return view('admin.pages.banner.index');
    }
}
