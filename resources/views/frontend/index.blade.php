@extends('frontend.dashboard')

@section('main')

@section('title')
	Felicity Properties Limited - Home
@endsection

<style>


  .my-swipe .img-fluid{
    max-width: auto !important;
    max-height: auto !important;
    min-height: 360px !important;

  }

</style>

		<main id="main">

      @php
          $blog = App\Models\BlogPost::latest()->limit(5)->get();
          $property = App\Models\Property::latest()->limit(6)->get();
      @endphp

      <!-- ======= Service Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Services</h2>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card shadow text-center p-2 my-card" >
              <div class="card-body">
                <i class="fa-solid fa-money-check-dollar mb-3" style="font-size: 45px; color: #800080;"></i>
                <h5 class="mb-3" style="color: #800080;">Property Sales and Purchase</h5>
                <small style="text-align: justify;">
                  Whether you are looking to invest in your dream home or capitalize on a promising real estate venture, Felicity Properties 
                  <a href="{{route('read.services')}}" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>
          <div class=" col-md-3 mb-3">
            <div class="card shadow text-center p-2 my-card">
              <div class="card-body">
                <i class="fa-solid fa-house mb-3" style="font-size: 45px; color: #800080;"></i>
                <h5 class="mb-3" style="color: #800080;">Rental Solutions</h5>
                <small style="text-align: justify;">
                  Our rental services cover a wide spectrum of residential and commercial properties, ensuring that our clients find the perfect space 
                  <a href="{{route('read.services')}}" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card shadow text-center p-2 my-card">
              <div class="card-body">
                <i class="fa-solid fa-shop mb-3" style="font-size: 45px; color: #800080;"></i>
                <h5 class="mb-3" style="color: #800080;">Long Lease</h5>
                <small style="text-align: justify; ">
                  Felicity Properties Limited facilitates long-term leases, providing a flexible and secure option for individuals and businesses seeking extended
                  <a href="{{route('read.services')}}" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>    
          <div class="col-md-3 mb-3">
            <div class="card shadow text-center p-2 my-card">
              <div class="card-body">
                <i class="fa-solid fa-shop mb-3" style="font-size: 45px; color: #800080;"></i>
                <h5 class="mb-3" style="color: #800080;">Long Lease</h5>
                <small style="text-align: justify;">
                  Felicity Properties Limited facilitates long-term leases, providing a flexible and secure option for individuals and businesses seeking extended
                  <a href="{{route('read.services')}}" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>     
        </div>
      </div>
      {{-- <div class="container">
        <div class="row">
          <div class=" col-sm-6 col-md-3 ">
            <div class="card shadow text-center p-2 my-card" data-aos="zoom-in-down" data-aos-duration="3000">
              <div class="card-body">
                <i class="fa-solid fa-globe mb-3" style="font-size: 45px;"></i>
                <h5 class="mb-3">Global Reach</h5>
                <small style="text-align: justify;">
                  We extend our services to Nigerians living abroad, ensuring that the process of buying, selling, or leasing property in Lagos remains seamless, transparent, and stress-free.
                  <a href="btn" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>
          <div class=" col-sm-6 col-md-3 ">
            <div class="card shadow text-center p-2 my-card" data-aos="zoom-in-down" data-aos-duration="3000">
              <div class="card-body">
                <i class="fa-solid fa-building-columns mb-3" style="font-size: 45px;"></i>
                <h5 class="mb-3">Investor Support:</h5>
                <small style="text-align: justify;">
                  Felicity Properties Limited is a preferred choice for investors looking to capitalize on the growing opportunities in the Nigerian real estate market. We offer strategic insights, market analysis,
                  <a href="btn" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>
          <div class=" col-sm-6 col-md-3 " style="display: none;">
            <div class="card shadow text-center p-2 my-card" data-aos="zoom-in-down" data-aos-duration="3000">
              <div class="card-body">
                <i class="fa-solid fa-house mb-3" style="font-size: 45px;"></i>
                <h5 class="mb-3">Property Sales and Purchase</h5>
                <small style="text-align: justify;">
                  Whether you are looking to invest in your dream home or capitalize on a promising real estate venture, Felicity Properties Limited offers
                  <a href="btn" style="color: #198754;">read more ...</a>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      </section>


    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
              </div>
              <div class="title-link">
                {{-- <a href="property-grid.html">All Property
                  <span class="bi bi-chevron-right"></span>
                </a> --}}
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper my-swipe">
          <div class="swiper-wrapper">
            
            @foreach ($property as $item)
            <div class="carousel-item-b swiper-slide ">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="{{asset($item->property_thumbnail)}}" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="{{route('finish.properties.details', $item->id)}}">
                          <br /> {{$item->city}}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">{{$item->property_status}} | &#8358; {{$item->price}}</span>
                      </div>
                      <a href="{{route('finish.properties.details', $item->id)}}" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>{{$item->property_size}}m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>{{$item->bedrooms}}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>{{$item->bathrooms}}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>{{$item->garage}}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
            @endforeach

          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= News Letter Section ======= -->
    {{-- <section class="section-agents section-t8 newsletter-el center">
      
                  <fieldset>
                    <h2 class="title-a">Subscribe</h2>
                    <h5>Sign up for our mailing list to get latest updates and offers on real estate properties</h5>
                    <form action="">
                      <div class="row">
                        <div class="col-md-3 py-2">
                        <input type="text" class="form-control" placeholder="Enter your Name"> 
                      </div>
                        <div class="col-md-3 py-2">
                        <input type="number" class="form-control" placeholder="Enter your Phone Number"> 
                      </div>
                        <div class="col-md-4 py-2">
                        <input type="email" class="form-control" placeholder="Enter your email address"> 
                      </div>
                        <div class="col-md-1 py-2">
                        <button class="btn btn-submit" type="submit">Submit</button>
                      </div>
                      </div>
                  </form>
                  </fieldset>
                
          
    </section> --}}
    <!-- End News Letter Section -->

    <!-- ======= NewsLetter2 Section ======= -->
    <div class="mt-5 p-5" style="background-color: #800080">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <img src="{{asset('frontend/assets/img/building.jpg')}}" alt="" class="img-fluid">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <h2 class="mb-3 text-white">Subscribe </h2>
            <h6 style="line-height: 2;" class="text-white">Sign up to get a free ebook that will guide you through on the latest updates and offers concerning properties in Nigeria</h6>
            <div class="mt-4 ">
              <form action="{{route('store.subscriber')}}" method="post">
                @csrf
                <div class="d-flex">
                  <input type="email" name="email" required class="form-control" id="" placeholder="Email">
                <button class="btn btn-submit" type="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ======= End NewsLetter2 Section ======= -->


    <!-- ======= Recent Blog Section ======= -->
    <section class="section-news section-t8" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Recent Blogs</h2>
              </div>
              <div class="title-link">
                {{-- <a href="blog-grid.html">All Blogs
                  <span class="bi bi-chevron-right"></span>
                </a> --}}
              </div>
            </div>
          </div>
        </div>

        <div id="news-carousel" class="swiper my-swipe">
          <div class="swiper-wrapper">
            @foreach ($blog as $item)
            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="{{asset($item->post_image)}}" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="{{url('blog/details/'.$item->post_slug)}}" class="category-b">{{$item->category->category_name}}</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}
                          <br><small style="font-size: 0.8rem;">{{$item->category->category_name}}</small></a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">{{$item->created_at->format('M d Y')}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
            @endforeach

          </div>
        </div>

        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->

    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Testimonials</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper slide my-slide ">
          <div class="swiper-wrapper">

            @php
                $testimonial = App\Models\Testimonial::latest()->limit(4)->get();
            @endphp

            @foreach ($testimonial as $test)
            <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="{{asset($test->photo)}}" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        {{$test->message}}
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="{{asset($test->photo)}}" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">{{$test->name}}</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
            @endforeach


          </div>
        </div>
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
@endsection