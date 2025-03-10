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


    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'mobile_no' => 'required|digits:10',
            'alt_mobile_no' => 'nullable|digits:10',
            'shop_address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pin_code' => 'required|digits:6',
            'photo' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Save retailer data to the database (assuming you have a Retailer model)
        $retailer = new \App\Models\Retailer();
        $retailer->shop_name = $request->shop_name;
        $retailer->owner_name = $request->owner_name;
        $retailer->mobile_no = $request->mobile_no;
        $retailer->alt_mobile_no = $request->alt_mobile_no;
        $retailer->shop_address = $request->shop_address;
        $retailer->city = $request->city;
        $retailer->state = $request->state;
        $retailer->pin_code = $request->pin_code;
        $retailer->latitude = $request->latitude;
        $retailer->longitude = $request->longitude;

        // Convert base64 image to file and store it
        if ($request->photo) {
            $image = $request->photo;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '.png';
            \File::put(public_path('uploads/') . $imageName, base64_decode($image));
            $retailer->photo = 'uploads/' . $imageName;
        }

        $retailer->save();

        return redirect()->back()->with('success', 'Retailer registered successfully!');
    }
}
