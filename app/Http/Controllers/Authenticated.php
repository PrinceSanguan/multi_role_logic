<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;



class Authenticated extends Controller
{

    /////////////////This Code Is For Login Authentication////////////////////////////////////////
    public function login() {

        return view ('login');
    }

    public function loginPost(Request $request) {

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

          // Authentication
          if (Auth::attempt($data)) {
            $user = Auth::user();
            
            // Check the user's role and redirect accordingly
            if ($user->userrole === 'admin') {
                return redirect()->route('admin');
            } elseif ($user->userrole === 'user') {
                return redirect()->route('user');
            } elseif ($user->userrole === 'programmer') {
                return redirect()->route('programmer');
            }
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
        }
    /////////////////This Code Is For Login Authentication////////////////////////////////////////

    /////////////////This Code Is For Registration////////////////////////////////////////
    public function registration() {
        return view ('registration');
    }

    public function registrationPost(Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'userrole' => 'required',
        ]);

        $user = User::create($data);

        if(!$user) {

            return redirect()->route('registration');
        }

        return redirect()->route('login');
    }
    /////////////////This Code Is For Registration////////////////////////////////////////

    /////////////////This Code Is For Logout////////////////////////////////////////
    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
    /////////////////This Code Is For Logout////////////////////////////////////////

    /////////////////This Code Is For Admin Account////////////////////////////////////////
    public function admin() {
        // Check if the authenticated user has the required role
        if (auth()->user()->userrole == 'admin' || auth()->user()->userrole == 'programmer') {
            return view('admin');
        } else {
            // Redirect non-admin users away from admin page
            return redirect()->route('forbidden');
        }
    }
    /////////////////This Code Is For Admin Account////////////////////////////////////////

    /////////////////This Code Is For User Account////////////////////////////////////////
    public function user() {
        // Check if the authenticated user is a User
        if (auth()->user()->userrole == 'user' || auth()->user()->userrole == 'programmer') {
            return view('user');
        } else {
            // Redirect admin away from user page
            return redirect()->route('forbidden');
        }
    }
    /////////////////This Code Is For User Account////////////////////////////////////////

     /////////////////This Code Is For Programmer Account////////////////////////////////////////
     public function programmer() {
        // Check if the authenticated user is a User
        if (auth()->user()->userrole == 'programmer') {
            return view('programmer');
        } else {
            // Redirect admin away from user page
            return redirect()->route('forbidden');
        }
    }
    /////////////////This Code Is For Programmer Account////////////////////////////////////////

     /////////////////This Code Is For Forbidden Page////////////////////////////////////////
    public function forbidden() {
        return view ('404.forbidden');
    }
    /////////////////This Code Is For Forbidden Page////////////////////////////////////////

}
