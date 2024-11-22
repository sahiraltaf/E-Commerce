<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
class CategoryController extends Controller
{
    public function getSubCategories(Request $request){
        $categoryId = $request->input('category_id');

        $result = SubCategory::where('category_id', $categoryId)->get();
        return response()->json([
            'success' => true,
            'subcategories' => $result
        ], 200);  // Return a 200 success status
    }
}
