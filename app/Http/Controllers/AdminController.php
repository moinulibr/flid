<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        // $orders = Order::all();
        // return view('admin.order.index', compact('orders'));
        return view('backend.dashboard.dashboard');
    }
    public function newsTicker()
    {
        return view('backend.news_ticker');
    }
    
    public function imageMessage()
    {
        return view('backend.image_messages');
    }

    public function importantLink()
    {
        return view('backend.important_links');
    }

    public function otherService()
    {
        return view('backend.other_services');
    }
}
