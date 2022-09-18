<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APITestController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 1,
            'data' => "yes, its working"
        ]);
    }
}
