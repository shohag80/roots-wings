@extends('Frontend.Master')


<!-- Products -->
@section('product')
    <div class="container col-md-12 pb-4">
        <div class="row">
            <h3 class="col-md-12 col-sm-12 mt-5">AllProducts</h3>
            <hr class="border-success" />
            @forelse($products as $item)
                <div style="float: left;" class="col-md-3 col-sm-6 mt-2 mb-2">
                    <div class="card card-product">
                        <div class="card-body">

                            <div class="text-center position-relative">
                                <div class=" position-absolute top-0 start-0">
                                    @if ($item->created_at > \Carbon\Carbon::now()->subDays(30))
                                        <span class="badge bg-success">New</span>
                                    @endif
                                </div>
                                <a href="{{ route('Single_Product', $item->id) }}"> <img
                                        src="{{ url('/public/uploads/product_img/', $item->photo) }}" height="180" width="100%"
                                        alt="image"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action g_modal" data-bs-toggle="modal"
                                        data-bs-size="modal-lg" data-bs-target="#quickViewModal"
                                        data-bs-url="product-details/{{ $item->id }}" data-bs-method="get">
                                        <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i></a>
                                    <a href="{{ route('Add_to_wishlist', $item->id) }}" class="btn-action"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                            class="bi bi-heart"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                </div>

                            </div>


                            <div class="text-small mb-1"><a href="#!"
                                    class="text-decoration-none text-muted"><small>{{ $item->brand->brand_name }}</small></a>
                            </div>
                            <h2 class="fs-6"><a href="{{ route('Single_Product', $item->id) }}"
                                    class="text-inherit text-decoration-none">{{ $item->name }}</a></h2>
                            <div>

                                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </small> <span class="text-muted small">4.5(149)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark"> {{ $item->price }}/-</span>
                                    <!-- <span class="text-decoration-line-through text-muted">$24</span> -->
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <a href="{{ route('Product_Buy', $item->id) }}" class="btn btn-primary btn-sm m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Buy Now</a>
                                <a href="{{ route('Add_to_Cart', $item->id) }}" class="btn btn-primary btn-sm m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center m-5">
                    No Results Found!
                </div>
            @endforelse
        </div>
    </div>
@endsection
