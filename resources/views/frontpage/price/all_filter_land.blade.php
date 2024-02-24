@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Properties in Lekki
      @endsection
    <main id="main">
        <section class="mt-5">
            <div class="container-fluid mt-5">
              <div class="row justify-content-center">
                {{-- <div class= 'col-md-1' style='margin-top:100px;'> --}}
                  {{-- <form action="{{route('store.filter.finished')}}" method="post" enctype="multipart/form-data">
                  @csrf

                          <div class="price-range-block">

                <div class="sliderText">Filter by Price (&#8358;) </div>

                <div id="slider-range" class="price-filter-range" name="rangeInput" style='width:180px;'></div>
                  
                <div style="margin:20px auto"> 
                  <input type="number"  id="min_price" class="price-range-field" name = 'min_price' style='width:90px;'/> 
                  <input type="number"  id="max_price" class="price-range-field" name = 'max_price' 
                  style='width:90px;'/>
                </div>

                <button type = 'submit' class='btn btn-success'>Filter</button>

                <div id="searchResults" class="search-results-block"></div>

              </div>
          </form> --}}
                {{-- </div> --}}
                <div class = 'col-md-10 mt-3'>
                   
                  <h2 class="text-center" style="margin-top: 80px; margin-bottom:30px;">Land Properties in {{$prop->citys->city}}</h2>
                  <h5 class='text-center text-{{count($property) === 0 ? 'danger':'success'}} mb-3'>{{count($property)}} property found</h5>
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
                                <span class="price-a">Price | &#8358;  {{ number_format($item->price) }} m</span>
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
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection