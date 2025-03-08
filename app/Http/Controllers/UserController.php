<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function userRegister()
    {
        return view('user.register');
    }

    public function userRegisterPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'designation' => ['required'],
            'aadhar' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        $randomNumber = rand(00001, 99999);
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->code = 'panmasala' . $randomNumber;
        $user->designation = $request->designation;
        $user->aadhar = $request->aadhar;
        $user->password = Hash::make($request->password);
        $user->password_hint = $request->password;
        $user->status = 'Pending';
        $user->save();

        $notification = array(
            'message' => 'User Registered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    }

    public function userLogin()
    {
        return view('user.login');
    }

    public function userLoginPost(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('code', 'password');
        $credentials['password'] = $request->password;
        // dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) {
            // dd('hi');
            $notification1 = array(
                'message' => 'User Login Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user-dashboard')->with($notification1);
        } else {
            $notification2 = array(
                'message' => 'Invalid Credentials',
                'alert-type' => 'error'
            );
            return back()->with($notification2);
        }
    }


    public function userDashboard()
    {
        $user = Auth::guard('web')->user();
        return view('user.dashboard',compact('user'));
    }

    public function createWallPoster()
    {
        return view('user.wallposter.create');
    }
}
