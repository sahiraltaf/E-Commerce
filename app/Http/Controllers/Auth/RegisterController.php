<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'phone' => ['required'],
   
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

    }
    public function create(){
    
        return view('admin-panel.register');
    
    }
    public function store(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->save();
        return redirect()->route('login');
    }
}
