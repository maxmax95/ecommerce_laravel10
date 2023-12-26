<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class LoginController extends Controller
{
    public function auth(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email input is mandatory!',
            'email.email' => 'Input a valid email, please!',
            'passowrd.required' => 'Password is mandatory!',
        ]);

        ///dd($credentials);

        if(Auth::attempt($credentials, $request->remember)){
            ///
            $request->session()->regenerate();
            $user = Auth::user();
            session(['sessionUser' => $user]);
            ///dd(auth()->user()); ///teste dd
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->back()->with('erro', 'Invalid user password');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home/index'));
    }

    public function create(){
        return view('login/create');
    }
}
