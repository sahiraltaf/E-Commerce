<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
class HomeController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        $product_four = Product::paginate(4);
        $data['subcategories'] = SubCategory::all();
        if($request->ajax() && $request->action == "search-product"){
            $product_four = Product::where('sub_category_id', $request->sub_cat_id)->paginate(4);
        }
        $data['subcategories'] = SubCategory::all();
        $data['product_four'] = $product_four;
        $data['products']      = $products;

        if($request->ajax() && $request->action == "search-product"){
            return view('front_product')->with($data);
        }
        return view('index')->with($data);
    }

    public function shop(Request $request){
        // $products = Product::all();
        // $perpage = 3;
        $products = Product::paginate(9);
        // $data['subcategories'] = SubCategory::all();
        if($request->ajax()){
            if($request->sub_cat_id){
                $where =[
                    ['sub_category_id', $request->sub_cat_id],
                ];
                // $products=Product::where('sub_category_id', $request->sub_cat_id)->paginate(9);
            }
            if($request->cat_id){
                $where =[
                    ['category_id', $request->cat_id],
                ];
                // $products=Product::where('category_id', $request->cat_id)->paginate(9);
            }
            if($request->range){
                $where =[
                    ['price', '<=', $request->range],
                ];
                // $products=Product::where('price', '<=', $request->range)->paginate(9);
            }
            $products = Product::where($where)->paginate(9);    
        }
        $data['subcategories'] = SubCategory::all();
        // $data['product_four'] = $product_four;
        $data['products']      = $products;
        $data['categories']    = Category::all();
        
        if($request->ajax()){
            return view('shop_product')->with($data);
        }
        return view('shop')->with($data);        
    }
}
