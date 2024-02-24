@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Unfinished Property Details
      @endsection
    <main id="main">
        <section class="intro-single">
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-lg-8">
                  <div class="title-single-box">
                    {{-- <h1 class="title-single">{{$property->property_name}}</h1> --}}
                    <span class="title-single">{{$pid->property_name}}</span>
                    {{-- <span class="color-text-a">{{$property->property_name}}</span> --}}
                  </div>
                </div>
            
              </div>
            </div>
          </section><!-- End Intro Single-->
      
          <!-- ======= Property Single ======= -->
          {{-- @foreach ($property as $item) --}}
          <section class="property-single nav-arrow-b">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div id="property-single-carousel" class="swiper">
                    <div class="swiper-wrapper">
                      <div class="carousel-item-b swiper-slide">
                        <img src="{{asset($pid->property_thumbnail)}}" alt="">
                      </div>
                      <div class="carousel-item-b swiper-slide">
                        <img src="{{asset($pid->multi_img->photo_name)}}" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="property-single-carousel-pagination carousel-pagination"></div>
                </div>
              </div>
      
              <div class="row">
                <div class="col-sm-12">
      
                  <div class="row justify-content-between">
                    <div class="col-md-5 col-lg-4">
                      <div class="property-price d-flex justify-content-center foo">
                        <div class="card-header-c d-flex">
                          <div class="card-box-ico">
                            <span class="bi bi-cash">&#8358;</span>
                          </div>
                          <div class="card-title-c align-self-center">
                            <h5 class="title-c">{{number_format($pid->price)}}</h5>
                          </div>
                        </div>
                      </div>
                      <div class="property-summary">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="title-box-d section-t4">
                              <h3 class="title-d">Quick Summary</h3>
                            </div>
                          </div>
                        </div>
                        <div class="summary-list">
                          <ul class="list">
                            <li class="d-flex justify-content-between">
                              <strong>Property ID:</strong>
                              <span>{{$pid->id}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Location:</strong>
                              <span>{{$pid->citys->city}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Property Type:</strong>
                              <span>{{$pid->type->type_name}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Status:</strong>
                              <span>{{$pid->property_status}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Area:</strong>
                              <span>{{$pid->property_size}}
                                <sup>2</sup>
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Bedrooms:</strong>
                              <span>
                                <span>
                                    @if ($pid->bedrooms !== NULL)
                                      {{$pid->bedrooms}}
                                    @else
                                      <span>0</span>
                                    @endif
                                  </span>
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Bathrooms:</strong>
                              <span>
                                <span>
                                    @if ($pid->bathrooms !== NULL)
                                      {{$pid->bathrooms}}
                                    @else
                                      <span>0</span>
                                    @endif
                                  </span>
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Garage:</strong>
                              <span>
                                <span>
                                    @if ($pid->garage !== NULL)
                                      {{$pid->garage}}
                                    @else
                                      <span>0</span>
                                    @endif
                                  </span>
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                               <button class="btn btn-primary">Buy</button>
                               <a href="{{route('inspect.property', $pid->id)}}" class="btn btn-warning">Book For Inpection</a>
                              </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7 col-lg-7 section-md-t3">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="title-box-d">
                            <h3 class="title-d">Property Description</h3>
                          </div>
                        </div>
                      </div>
                      <div class="property-description">
                        <p class="description color-text-a">
                          {{$pid->short_desc}}
                        </p>
                        <p class="description color-text-a no-margin">
                          {{$pid->long_desc}}
                        </p>
                      </div>
                      {{-- <div class="row section-t3">
                        <div class="col-sm-12">
                          <div class="title-box-d">
                            <h3 class="title-d">Amenities</h3>
                          </div>
                        </div>
                      </div> --}}
                      {{-- <div class="amenities-list color-text-a">
                        <ul class="list-a no-margin">
                          <li>Balcony</li>
                          <li>Outdoor Kitchen</li>
                          <li>Cable Tv</li>
                          <li>Deck</li>
                          <li>Tennis Courts</li>
                          <li>Internet</li>
                          <li>Parking</li>
                          <li>Sun Room</li>
                          <li>Concrete Flooring</li>
                        </ul>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <h4 class="text-center">Property Video</h4>
                <div class="col-md-10">
                    <iframe width="1200" height="315" src="{{$pid->property_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                
              </div>
            </div>
          </section>   
          {{-- @endforeach  --}}
    </main>


@endsection