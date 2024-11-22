<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'price', 'discount_type', 'sub-category_id','description','image'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function cart()
    {
        $this->hasMany(Cart::class);
    }

}
