<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::truncate();
        $categories = [
            'electronics' => ['Mobile', 'Laptop', 'Washing Machine', 'Computer'],
            'clothing' => ['Man', 'Women', 'Children']
            
        ];
        foreach($categories as $categoryName => $subcategories){
            $category = Category::firstOrCreate(['name'=> $categoryName]);
            foreach($subcategories as $subcategoryName){
                $subcategory = SubCategory::firstOrNew([
                    'category_id' => $category->id,
                    'name' =>$subcategoryName,
                ]);
                if(!$subcategory->exists){
                    $subcategory->save();
                }
            }
        }
    }
}
