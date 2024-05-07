<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            } else if ($user->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            } else if ($user->is_vendor == 1) {
                return redirect()->route('vendor.dashboard');
            } else if ($user->is_customer == 1) {
                return redirect()->route('customer.home');
            }
        }

        return view('auth.login');
    }
    public function login_here(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inputs = $request->only('email', 'password');

        $login = Auth::attempt($inputs);



        if (!$login) {
            return redirect()->back()->with('fail', 'invalid email/password');
        }

        $user = Auth::user();
        if (!$user->is_admin && !$user->is_vendor && !$user->is_customer) {
            return redirect()->back()->with('fail', 'Invalid user');
        } else if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        } else if ($user->is_vendor) {
            return redirect()->route('vendor.dashboard');
        } else if ($user->is_customer) {
            return redirect()->route('customer.home');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
