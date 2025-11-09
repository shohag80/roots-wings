<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Cache::get('products', function () {
            return Product::all();
        });
        return view('Frontend/Pages/Product/list', compact('products'));
    }

    public function product_details($product_id)
    {
        $product = Product::with('brand')->find($product_id);
        return view('Frontend.Pages.Product.product_modal', compact('product'));
    }

    public function product($id)
    {
        $single_product = Product::with('brand')->find($id);
        $products = Product::where('category_id', $single_product->category_id)->get();
        return view('Frontend.Pages.Product.single_view', compact('single_product', 'products'));
    }
}
