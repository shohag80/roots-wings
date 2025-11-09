@extends('Frontend.Master')

@section('product')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <!-- Product section-->
                <section class="py-5">
                    <div class="container border rounded p-3 px-4 px-lg-5 my-5">
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                    src="{{ url('/public/uploads/product_img/' . $single_product->photo) }}" alt="..." /></div>
                            <div class="col-md-6">
                                <div class="small mb-1">{{ $single_product->brand->name }}</div>
                                <h1 class="fw-bolder">{{ $single_product->name }}</h1>
                                <div class="fs-5 mb-5">
                                    <!-- <span class="text-decoration-line-through">$45.00</span> -->
                                    <span>BDT-{{ $single_product->price }}/-</span>
                                </div>
                                <p class="lead">{{ $single_product->discription }}</p>
                                <div class="d-flex">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="num"
                                        value="1" style="max-width: 3rem" />
                                    <button class="btn btn-outline-light flex-shrink-0" type="button"><a
                                            href="{{ route('Add_to_Cart', $single_product->id) }}">
                                            <i class="bi-cart-fill me-1"></i>
                                            Add to cart</a>
                                    </button>
                                </div>
                                <hr class="my-6" />
                                <div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="p-2">Product Code:</td>
                                                <td class="p-2">FBB00255</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2">Availability:</td>
                                                <td class="p-2">In Stock</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2">Type:</td>
                                                <td class="p-2">Fruits</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2">Shipping:</td>
                                                <td class="p-2">
                                                    <small>
                                                        01 day shipping.
                                                        <span class="text-muted">( Free pickup today)</span>
                                                    </small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-2"></div>
        </div>
        @include('Frontend.Partials.Product')
    </div>
@endsection
