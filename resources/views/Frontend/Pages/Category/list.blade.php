@extends('Frontend.Master')

@section('category')
    <!-- Category Section Start-->
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 mb-6">
                    <h3 class="mb-0">Featured Categories</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @forelse($category as $item)
                        <div class="col-md-3">
                            <a href="{{ route('product_by_category', $item->id) }}" class="text-decoration-none text-inherit">
                                <div class="card card-product mb-lg-4">
                                    <div class="card-body text-center py-4">
                                        <img height="150px" width="100%"
                                            src="{{ url('/public/uploads/category_img/', $item->photo) }}" alt="Categofy_photo">
                                        <h5 class="text-truncate mt-4">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="text-center m-5">
                            No Results Found!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>


    <!-- Category Section End-->
@endsection
