<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function form()
    {
        $categories = Category::all();
        $sub_category = Subcategory::all();
        $brand = Brand::all();
        return view('Backend.Pages.Products.Add_Product', compact('categories', 'sub_category', 'brand'));
    }

    public  function list()
    {
        $product = Product::with(['brand', 'category', 'subcategory'])->paginate(31);
        return view('Backend.Pages.Products.Product_list', compact('product'));
    }


    public function delete($id)
    {
        $delete = Product::find($id);
        if ($delete) {
            $delete->delete();
        }
        return redirect()->route('product_list');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'price'             => 'required',
            'stock'             => 'required',
            'photo'             => 'required',
            'brand_id'          => 'required',
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = date('Ymdhis') . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('uploads/product_img/', $fileName);
        }

        Product::create([
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->sub_category_id,
            'brand_id'          => $request->brand_id,
            'name'              => $request->name,
            'price'             => $request->price,
            'stock'             => $request->stock,
            'photo'             => $fileName,
            'description'       => $request->description,
        ]);
        notify()->success('New Product Added successfully.');
        return redirect()->route('product_list');
    }


    // public function product($id)
    // {
    //     $product_view = Product::find($id);
    //     //dd($product_view);
    //     return view('Backend.Pages.ProductView', compact('product_view'));
    // }

    public function edit($id)
    {
        $categories = Category::all();
        $sub_category = Subcategory::all();
        $brand = Brand::all();
        $product_info = Product::where('id', $id)->first();
        return view('Backend.Pages.Products.Edit_Product', compact('categories', 'sub_category', 'brand', 'product_info'));
    }



    public function update(Request $request, $id)
    {
        $editProduct = Product::find($id);

        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'price'             => 'required',
            'stock'             => 'required',
            'brand_id'          => 'required',
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error('Please Check Your Required Input Field.');
            return redirect()->back()->withInput();
        }

        if ($editProduct) {
            $photo_name = $editProduct->photo;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photo_name = date('Ymdhis') . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('/uploads/product_img/', $photo_name);
            }

            $editProduct->update([
                'category_id'       => $request->category_id,
                'subcategory_id'    => $request->sub_category_id,
                'brand_id'          => $request->brand_id,
                'name'              => $request->name,
                'price'             => $request->price,
                'stock'             => $request->stock,
                'photo'             => $photo_name,
                'description'       => $request->description,
            ]);
        }
        notify()->success('Product Update Successfully.');
        return redirect()->route('product_list');
    }



    public function getSubcategories($category_id)
    {
        $sub_category = Subcategory::where('category_id', $category_id)->get();
        return $sub_category;
    }
}
