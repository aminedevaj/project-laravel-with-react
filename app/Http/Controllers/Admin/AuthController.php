<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Reservation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error','Invalid credentials');
    }

    public function dashboard()
    {
      
    $reservations = Reservation::orderBy('created_at', 'desc')->get();
    return view('admin.dashboard', compact('reservations'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}