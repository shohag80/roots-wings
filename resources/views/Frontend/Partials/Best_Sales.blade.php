<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h3 class="mb-0 mt-5">Daily Best Sells</h3>
            </div>
        </div>
        <hr class="border-success" />
        <div class="table-responsive-xl pb-6">
            <div class="col-md-12">
                <div class="row row-cols-lg-4 row-cols-1 row-cols-md-2 g-4">
                    <div class="col-md-3">
                        <div class=" pt-8 px-6 px-xl-8 rounded"
                            style="background:url(https://mir-s3-cdn-cf.behance.net/project_modules/fs/b5fc1e102243859.5f3245dcbf6b8.png)no-repeat; background-size: cover; height: 100%; width:100%">
                            <div style="padding-top: 45%;" class="text-center">
                                <h3 class="fw-bold text-white mt-2"><span class="text-success">100% Organic</span>
                                    Green Tea.
                                </h3>
                                <p class="text-white"><b>Get the best deal before close.</b></p>
                                <a href="#!" class="btn btn-primary text-center">Shop Now <i
                                        class="bi bi-cart"></i></a>
                            </div>
                        </div>
                    </div>
                    @forelse($best_sales as $item)
                        <div class="col-md-3">
                            <div class="card card-product">
                                <div class="card-body">
                                    <div class="text-center  position-relative ">
                                        <div class=" position-absolute top-0 start-0">
                                            @if ($item->created_at > \Carbon\Carbon::now()->subDays(30))
                                                <span class="badge bg-success">New</span>
                                            @endif
                                        </div>
                                        <a
                                            href="{{ route('Single_Product', $item->id) }}"><img style="width: 100%; height: 180px"
                                                src="{{ url('/public/uploads/product_img/', $item->photo) }}"
                                                alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                                        <div class="card-product-action">
                                            <a href="#!" class="btn-action g_modal" data-bs-toggle="modal"
                                                data-bs-size="modal-lg"
                                                data-bs-url="{{ url('product-details', $item->id) }}"
                                                data-bs-method="get" data-bs-target="#quickViewModal"><i
                                                    class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                                    title="Quick View"></i></a>
                                            <a href="{{ route('Add_to_wishlist', $item->id) }}" class="btn-action"
                                                data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                                    class="bi bi-heart"></i></a>
                                            <a href="#!" class="btn-action" data-bs-toggle="tooltip"
                                                data-bs-html="true" title="Compare"><i
                                                    class="bi bi-arrow-left-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-small mb-1"><a href="#!"
                                            class="text-decoration-none text-muted"><small>Tea, Coffee &
                                                Drinks</small></a></div>
                                    <h2 class="fs-6"><a href="{{ route('Single_Product', $item->id) }}"
                                            class="text-inherit text-decoration-none">{{ $item->name }}</a></h2>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div><span class="text-dark">৳ {{ $item->price }}/-</span> 
                                        <!--<span class="text-decoration-line-through text-muted">500</span>-->
                                        </div>
                                        <!--<div>-->
                                        <!--    <small class="text-warning"> <i class="bi bi-star-fill"></i>-->
                                        <!--        <i class="bi bi-star-fill"></i>-->
                                        <!--        <i class="bi bi-star-fill"></i>-->
                                        <!--        <i class="bi bi-star-fill"></i>-->
                                        <!--        <i class="bi bi-star-half"></i>-->
                                        <!--    </small>-->
                                        <!--    <span><small>4.5</small></span>-->
                                        <!--</div>-->
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
                                    <!--<div class="d-flex justify-content-start text-center m-1">-->
                                    <!--    <div class="text-center" data-countdown="{{ date('Y') }}/12/31 00:00:00"></div>-->
                                    <!--</div>-->
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
        </div>
    </div>
</section>
