<?php

namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

class ProjectorController extends Controller
{
    public function create()
    {
        $ip = request()->ip();
        $location = Location::get($ip);
        // dd($location);
        return view('user.projector.create', compact('location'));
    }
    public function index()
    {
        return view('user.projector.index');
    }
}
