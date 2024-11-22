<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users =  User::Where('role','!=', 1)->get();
        // dd($users);
        return view('admin-panel.users.list', compact('users'));
    }
}
