<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class RetailerController extends Controller
// {
//     public function retailerCreate(){
//         return view('user.retailer.create');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

// class RetailerController extends Controller
// {
//     public function retailerCreate(Request $request)
//     {
//         $distributors = [];  // Default empty array
//         $selectedDistrict = null;

//         if ($request->has('district')) {
//             $selectedDistrict = $request->input('district');
//             $distributors = Distributor::where('district', $selectedDistrict)->get();
//         }

//         return view('user.retailer.create', compact('distributors', 'selectedDistrict'));
//     }
// }



class RetailerController extends Controller
{
    public function retailerCreate(Request $request)
    {
        $districts = [
            'Alipurduar',
            'Bankura',
            'Birbhum',
            'Cooch Behar',
            'Dakshin Dinajpur',
            'Darjeeling',
            'Hooghly',
            'Howrah',
            'Jalpaiguri',
            'Malda',
            'Murshidabad',
            'Nadia',
            'Purulia'
        ];
        $selectedDistrict = $request->input('district');

        // Distributor Data (Ideally should come from the database)
        $distributorData = [
            'Alipurduar' => ['Distributor B1', 'Distributor B2'],
            'Bankura' => ['Distributor B1', 'Distributor B2'],
            'Birbhum' => ['Distributor B1', 'Distributor B2'],
            'Cooch Behar' => ['Distributor B1', 'Distributor B2'],
            'Dakshin Dinajpur' => ['Distributor D1', 'Distributor D2'],
            'Darjeeling' => ['Distributor D1', 'Distributor D2'],
            'Hooghly' => ['Distributor D1', 'Distributor D2'],
            'Howrah' => ['Distributor H1', 'Distributor H2'],
            'Jalpaiguri' => ['Distributor H1', 'Distributor H2'],
            'Malda' => ['Distributor H1', 'Distributor H2'],
            'Murshidabad' => ['Distributor H1', 'Distributor H2'],
            'Nadia' => ['Distributor N1', 'Distributor N2'],
            'Purulia' => ['Distributor N1', 'Distributor N2'],
        ];

        $selectedDistrict = $request->input('district');
        $distributors = $selectedDistrict ? ($distributorData[$selectedDistrict] ?? []) : [];

        return view('user.retailer.create', compact('districts', 'selectedDistrict', 'distributors'));
    }
}
