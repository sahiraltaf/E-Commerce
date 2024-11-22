<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use Auth;
class ProductController extends Controller
{
    public function index(){
        $products =  Product::all();
        return view('admin-panel.products.list', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin-panel.products.create', compact('categories', 'subcategories'));
    }
    public function store(Request $request){
        if($request->file('image'))
        {
            $file       = $request->file('image');
            $image_name = time().rand(10000, 99999).$file->getClientOriginalName();
            $file->move('uploads/products/', $image_name);
            $image_name = 'uploads/products/'.$image_name;
        }
        $product = new Product;
        $product->title            = $request->title;
        $product->price            = $request->price;
        $product->discount_price   = $request->discount_price;
        $product->description      = $request->description;
        $product->category_id      = $request->category;
        $product->sub_category_id  = $request->subcategory;
        $product->image            = $image_name ?? null;
        $product->save();
        session()->flash('success', 'Product added successfully!');
        return redirect()->route('products.list');
    }

    public function addCart(Request $request){
        $cart = Cart::where(['user_id' => Auth::id(), 'product_id' => $request->prod_id])->first();
        if(!$cart){
            $cart = new Cart();
            $cart->product_id = $request->prod_id;
            $cart->user_id    = Auth::id();
            $cart->save();
            $cart_count = Cart::where('user_id', Auth::id())->count();
            // $subcategories = SubCategory::all();
            return response()->json(['success' => true, 'cart_counter' => $cart_count,  'message' => 'product added to cart successfully']);
        
        }

        // return view('admin-panel.products.create', compact('categories', 'subcategories'));
    }

    public function cart(Request $request){
        $cart_prod = Cart::where(['user_id' => Auth::id()])->get();
        return view('cart', compact('cart_prod'));
    }
    public function updateCart(Request $request){
        $cart = Cart::find($request->cart_id);
        $cart->quantity = $request->quantity;
        $cart->save();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return response()->json(['success' => true, 'cart_counter' => $cart_count]);    
    }
    public function removeCart(Request $request){
        $cart =  Cart::find($request->cart_id);
        $cart->delete();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return response()->json(['success' => true, 'cart_counter' => $cart_count, 'message' => 'product deleted from cart successfully']);
    }
    public function totalPayout(Request $request){
        $cart_total = Cart::where('user_id', Auth::id())->get();
        $sub_total_payout = 0;
        foreach($cart_total as $cart){
            $sub_total_payout = $sub_total_payout + ($cart->quantity* $cart->product->price); 
        }
        return response()->json(['success' => true, 'sub_total_payout' => $sub_total_payout]);
    }
    public function checkout(){
        $cart_total = Cart::where('user_id', Auth::id())->get();
        $sub_total_payout = 0;
        foreach($cart_total as $cart){
            $sub_total_payout = $sub_total_payout + ($cart->quantity* $cart->product->price); 
        }
        return view('checkout', compact('cart_total', 'sub_total_payout'));   
    }

}
