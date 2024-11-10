<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin-panel.products.list');
    }
    public function create(){
        return view('admin-panel.products.create');
    }
}
