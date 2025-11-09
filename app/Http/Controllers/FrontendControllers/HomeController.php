<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function userHome()
    {
        $products = Product::with('brand', 'category', 'subcategory')->get();
        $best_sales = Product::with('brand', 'category', 'subcategory')->get();
        $category = Category::all();
        $slider = Slider::where('status', 1)->get();
        $wishlist = Wishlist::where('user_id', auth()->id() ?? 0)->get();
        return view('Frontend.Pages.Home.home', compact('products', 'category', 'wishlist', 'slider', 'best_sales'));
    }

    public function search(Request $request)
    {
        if ($request->search != '') {
            $input = $request->search;
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->get();
            return view('Frontend.Pages.Home.home_search', compact('products', 'input'));
        }
        return redirect()->route('User_Home')->with('warning', 'Write anythings for search!');
    }
}
