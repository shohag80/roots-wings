<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories(){
        $category=Category::all();
        return view('Frontend/Pages/Category/List',compact('category'));
    }

    public function product_by_category($category_id){
        $products=Product::where('category_id',$category_id)->get();
        return view('Frontend.Pages.Product.list',compact('products'));
    }
    
}
