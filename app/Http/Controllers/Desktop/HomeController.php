<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('desktop.index');
    }
}
