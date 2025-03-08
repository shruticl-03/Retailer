<?php

namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

class WallPosterController extends Controller
{
    public function create()
    {
        // $ip = request()->ip();
        $ip = "192.168.1.40";
        $location = Location::get($ip);
        // dd($location);
        return view('user.wallposter.create', compact('location'));
    }


    public function index()
    {
        return view('user.wallposter.index');
    }
}
