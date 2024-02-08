@extends('frontpage.dashboard')

<style>
    @media screen and (max-width: 540px) {
    .mob {
      margin-top: 110px !important;
    }
  }
  </style>


@section('main')
        @section('title')
            Felicity Properties - Land Property
        @endsection
    <main id="main">
        <section class="mt-5">
            <div class="container mt-5">
              <div class="row">
                <h2 class="text-center mob" style="margin-top: 80px;">Land Properties</h2>
                <div id="property-carousel" class="swiper">
                  <div class="swiper-wrapper">
                    @foreach ($property as $item)
                    <div class="carousel-item-b swiper-slide">
                      <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                          <img src="{{asset($item->property_thumbnail)}}" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                          <div class="card-overlay-a-content">
                            <div class="card-header-a">
                              <h2 class="card-title-a">
                                <a href="property-single.html">{{$item->property_name}}
                                  <br /> {{$item->city}}</a>
                              </h2>
                            </div>
                            <div class="card-body-a">
                              <div class="price-box d-flex">
                                <span class="price-a">Price | &#8358;  {{$item->price}}</span>
                              </div>
                              <div>
                                <a href="{{route('buy.finished.property', $item->id)}}" class="link-a">Click here to buy
                                  <span class="bi bi-chevron-right"></span>
                                </a>
                              </div>
                              <div>
                                <a href="{{route('finish.properties.details', $item->id)}}" class="link-a">Click here to view
                                  <span class="bi bi-chevron-right"></span>
                                </a>
                              </div>
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
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection