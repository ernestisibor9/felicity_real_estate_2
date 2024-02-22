@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Properties in Lekki
      @endsection
    <main id="main">
        <section class="mt-5">
            <div class="container-fluid mt-5">
              <div class="row">
                <div class= 'col-md-3' style='margin-top:20px;'>
                  <form action="{{route('store.filter.finished')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type='hidden' id='city_id' name='city_id' value="{{$prop->city_id}}"/>

                          <div class="price-range-block">

                <div class="sliderText">Filter by Price (&#8358;) </div>

                <div id="slider-range" class="price-filter-range" name="rangeInput" style='width:180px;'></div>
                  
                <div style="margin:20px auto"> 
                  <input type="number"  id="min_price" class="price-range-field" name = 'min_price' style='width:90px;'/> 
                  <input type="number"  id="max_price" class="price-range-field" name = 'max_price' 
                  style='width:90px;'/>
                </div>

                <button type = 'submit' class='btn btn-success mb-3'><i class="fa-solid fa-filter"></i> Filter</button>

                <div id="searchResults" class="search-results-block"></div>
                </form>
                <div>
                
                     <form action="{{route('store.filter.property.type')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type='hidden' id='city_id' name='city_id' value="{{$prop->city_id}}"/>

                        <div class="sliderText">Filter by Property Type </div>
                        <select class = 'form-select' name = 'ptype_id'>
                            <option value=''>Property Type</option>
                            @foreach ($propertyType as $item)
                                <option value="{{$item->id}}">{{$item->type_name}}</option>
                            @endforeach
                        </select>
                         <button type = 'submit' class='btn btn-danger mt-3'><i class="fa-solid fa-filter"></i> Filter</button>
                    </form>
                </div>
              </div>
            </div>
                <div class = 'col-md-9 mt-3'>
                   
                  <h2 class="text-center" style="margin-top: 80px; margin-bottom:30px;">Finished Properties in {{$prop->citys->city}}</h2>
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