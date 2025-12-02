<section class="mt-8">
  <div class="container">
    <div class="hero-slider">
      @foreach($slider as $item)
      <div style="background: url('{{url('public/uploads/slider_img').'/'.$item->photo}}') no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
        <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
          <span class="badge text-bg-warning">{{$item->sub_title}}</span>
          <h2 class="text-white display-5 fw-bold mt-4">{{$item->title}}</h2>
          <p class="text-warning"><b>{{$item->description}}</b></p>
          <a href="{{$item->link}}" class="btn btn-dark mt-3">Shop Now <i class="bi bi-arrow-right ms-1 icon-arrow-right"></i></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>