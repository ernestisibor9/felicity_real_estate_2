@extends('frontpage.dashboard')

<style>
    @media screen and (max-width: 540px) {
    .mob {
      margin-top: 50px;
    }
    .sect{
      margin-top: -280px;
    }
  }
  </style>

  <style>
.my-swipe .img-fluid{
    max-width: auto !important;
    max-height: auto !important;
    min-height: 360px !important;

  }
  .finish-cont{
    margin-bottom: -150px;
  }

</style>

@section('main')
    @section('title')
    Felicity Properties - Shown All Property
    @endsection
    <main id="main">
        <!-- ======= Finished Properties Section ======= -->
        <section class="section-property section-t8 finish-cont">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between mob">
                    <div class="title-box">
                        @if (count($finishedProperties) >= 0)
                        <h2 class="title-a">Finished Properties</h2>
                        @else
                        <h2 class="title-a"></h2> 
                        @endif 
                    </div>
                    {{-- <div class="title-link">
                    <a href="property-grid.html">Finished Properties
                        <span class="bi bi-chevron-right"></span>
                    </a>
                    </div> --}}
                </div>
                </div>
            </div>
    
            <div id="property-carousel" class="swiper swipe-prop my-swipe ">
                <div class="swiper-wrapper">
                
                @foreach ($finishedProperties as $item)
                <div class="carousel-item-b swiper-slide">
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
        </section><!-- End Finished Properties Section -->

        <!-- ======= Unfinished Properties Section ======= -->
        <section class="section-property section- sect finish-cont">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        @if (count($finishedProperties) >= 0)
                        <h2 class="title-a">Unfinished Properties</h2>
                        @else
                        <h2 class="title-a"></h2> 
                        @endif 
                    </div>
                    {{-- <div class="title-link">
                    <a href="property-grid.html">Unfinished Properties
                        <span class="bi bi-chevron-right"></span>
                    </a>
                    </div> --}}
                </div>
                </div>
            </div>
    
            <div id="property-carousel" class="swiper swipe-prop my-swipe ">
                <div class="swiper-wrapper">
                
                @foreach ($unfinishedProperties as $item)
                <div class="carousel-item-b swiper-slide">
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

        <!-- ======= Land Properties Section ======= -->
        <section class="section-property section- sect finish-cont">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    {{-- <h2 class="title-a">Land Properties</h2> --}}
                    @if (count($land) >= 0)
                        <h2 class="title-a">Land Properties</h2>
                    @else
                    <h2 class="title-a"></h2> 
                    @endif  
                    </div>
                    {{-- <div class="title-link">
                    <a href="property-grid.html">Land Properties
                        <span class="bi bi-chevron-right"></span>
                    </a>
                    </div> --}}
                </div>
                </div>
            </div>
    
            <div id="property-carousel" class="swiper swipe-prop my-swipe ">
                <div class="swiper-wrapper">
                
                @foreach ($land as $item)
                <div class="carousel-item-b swiper-slide">
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

        <!-- ======= Rent Properties Section ======= -->
        <section class="section-property section- sect finish-cont">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    {{-- <h2 class="title-a">Land Properties</h2> --}}
                    @if (count($rent) >= 0)
                        <h2 class="title-a">Rent Properties</h2>
                    @else
                    <h2 class="title-a"></h2> 
                    @endif  
                    </div>
                    {{-- <div class="title-link">
                    <a href="property-grid.html">Rent Properties
                        <span class="bi bi-chevron-right"></span>
                    </a>
                    </div> --}}
                </div>
                </div>
            </div>
    
            <div id="property-carousel" class="swiper my-swipe ">
                <div class="swiper-wrapper">
                
                @foreach ($rent as $item)
                <div class="carousel-item-b swiper-slide">
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
    </main>


@endsection