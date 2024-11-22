<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories = ['Electronics', 'Clothing'];
        foreach($categories as $category){
            $cat = new Category;
            $cat->name = $category;
            $cat->save();
        }
    }
}
