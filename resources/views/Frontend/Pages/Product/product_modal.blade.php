<div class="col-lg-6">
    <!-- img slide -->
    <div class="product productModal" id="productModal">
        <div class="zoom" onmousemove="zoom(event)"
            style="background-image: url({{ url('/public/uploads/product_img/', $product->photo) }})">
            <!-- img -->
            <img src="{{ url('/public/uploads/product_img/', $product->photo) }}" alt="" />
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="ps-lg-8 mt-6 mt-lg-0">
        <a href="#!" class="mb-4 d-block">{{ $product->brand->name }}</a>
        <h2 class="mb-1 h1">{{ $product->name }}</h2>
        <div class="mb-4">
            <small class="text-warning">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </small>
            <a href="#" class="ms-2">(30 reviews)</a>
        </div>
        <div class="fs-4">
            <span class="fw-bold text-dark">$32</span>
            <span class="text-decoration-line-through text-muted">$35</span>
            <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
        </div>
        <hr class="my-6" />
        <div class="mb-4">
            <button type="button" class="btn btn-outline-secondary">250g</button>
            <button type="button" class="btn btn-outline-secondary">500g</button>
            <button type="button" class="btn btn-outline-secondary">1kg</button>
        </div>
        <div>
            <!-- input -->
            <!-- input -->
            <div class="input-group input-spinner">
                <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                <input type="number" step="1" max="10" value="1" name="quantity"
                    class="quantity-field form-control-sm form-input" />
                <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
            </div>
        </div>
        <div class="mt-3 row justify-content-start g-2 align-items-center">
            <div class="col-lg-6 col-md-6 col-6 d-grid">
                <!-- button -->
                <!-- btn -->
                <button type="button" class="btn btn-primary">
                    Add to cart
                </button>
            </div>
            <div class="col-md-6 col-6">
                <!-- btn -->
                <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true"
                    aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                <a class="btn btn-light" href="#!" data-bs-toggle="tooltip" data-bs-html="true"
                    aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
            </div>
        </div>
    </div>
</div>
<hr class="my-6" />
<div>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>Product Code:</td>
                <td>FBB00255</td>
            </tr>
            <tr>
                <td>Availability:</td>
                <td>In Stock</td>
            </tr>
            <tr>
                <td>Type:</td>
                <td>Fruits</td>
            </tr>
            <tr>
                <td>Shipping:</td>
                <td>
                    <small>
                        01 day shipping.
                        <span class="text-muted">( Free pickup today)</span>
                    </small>
                </td>
            </tr>
        </tbody>
    </table>
</div>
