@extends('Backend.Master')

@section('Container')

<div class="container">
    <div class="row pt-3 pb-3">
        <div class="col-md-3"></div>
        <div class="col-md-6 bg-body-secondary border rounded">
            <div class="row bg-success pt-5 pb-2 mb-2 rounded">
                <h3 class="text-center text-white"><span class="text-warning">Add</span> Product</h3>
            </div>
            <form action="{{route('product_store')}}" method="post" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Category" class="form-label">Category Name</label><span class="text-danger">*</span>
                                <select name="category_id" class="form-control" id="Category" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputProduct" class="form-label">Product Name</label><span class="text-danger">*</span>
                                <input type="text" name="name" required value="{{old('name')}}" class="form-control" id="InputProduct" placeholder="Enter Product Name">
                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputProductBrand" class="form-label">Product Brand</label><span class="text-danger">*</span>
                                <select name="brand_id" class="form-control" id="InputProductBrand" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brand as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputPrice" class="form-label">Product Price</label><span class="text-danger">*</span>
                                <input type="number" name="price" required value="{{old('price')}}" class="form-control" id="InputPrice" placeholder="Enter Product Price">
                                @error('price')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="SubCategory" class="form-label">Sub-Category Name</label><span class="text-danger">*</span>
                                <select name="sub_category_id" class="form-control" id="SubCategory" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                                @error('sub_category_id')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputPrice" class="form-label">Product Stock</label><span class="text-danger">*</span>
                                <input type="number" name="stock" required value="{{old('stock')}}" class="form-control" id="InputPrice" placeholder="Enter Product Stock">
                                @error('stock')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputPhoto" class="form-label">Product Image</label><span class="text-danger">*</span>
                                <input type="file" name="photo" required class="form-control" id="InputPhoto">
                                @error('photo')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputDescription" class="form-label">Description</label>
                                <textarea name="description" id="InputDescription" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="col-md-12 btn btn-outline-primary mt-3 mb-5">Submit</button>
            </form>
            <div class="col-md-3"></div>
        </div>
    </div>

    @endsection