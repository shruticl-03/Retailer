<?php

namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

class PanShopController extends Controller
{
    public function create()
    {
        $ip = request()->ip();
        $location = Location::get($ip);
        // dd($location);
        return view('user.panshop.create', compact('location'));
    }
    public function index()
    {
        return view('user.panshop.index');
    }
}
