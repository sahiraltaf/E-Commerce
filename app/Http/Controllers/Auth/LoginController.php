<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCode;
use App\Models\Cart;
use Session;
class LoginController extends Controller
{
    public function create(){
    
        return view('admin-panel.login');
    }

     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.dashboard');
        }
        
        // if (Auth::attempt($credentials)) {
        //     // Session::put('user_2fa', false);
        //     auth()->user()->generateCode();
        //     // dd('Hello');
        //     return redirect()->route('2fa.index');
        // }
        // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        
        Auth::logout();
        Cart::truncate();
        return redirect()->route('login');
    }
}
