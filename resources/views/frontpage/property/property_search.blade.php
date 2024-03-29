@extends('frontpage.dashboard')


@section('main')
    @section('title')
    Felicity Properties - Property Search
    @endsection
    <main id="main">
        <section class="intro-single">
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-lg-8">
                  <div class="title-single-box">
                    {{-- <h1 class="title-single">{{$property->property_name}}</h1> --}}
                    <span class="title-single">{{count($property)}} Property found</span>
                    {{-- <span class="color-text-a">{{$property->property_name}}</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </section><!-- End Intro Single-->
      
          <!-- ======= Property Single ======= -->
          @foreach ($property as $item)
          <section class="property-single nav-arrow-b">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div id="property-single-carousel" class="swiper">
                    <div class="swiper-wrapper">
                      <div class="carousel-item-b swiper-slide">
                        <img src="{{asset($item->property_thumbnail)}}" alt="">
                      </div>
                      {{-- <div class="carousel-item-b swiper-slide">
                        <img src="{{asset($item->multi_img->photo_name)}}" alt="">
                      </div> --}}
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
                            <h5 class="title-c">{{number_format($item->price)}}</h5>
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
                              <span>{{$item->id}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Property ID:</strong>
                              <span>{{$item->property_name}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Location:</strong>
                              <span>{{$item->citys->city}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Property Type:</strong>
                              <span>{{$item->type->type_name}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Status:</strong>
                              <span>{{$item->property_status}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Area:</strong>
                              <span>{{$item->property_size}}
                                <sup>2</sup>
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Beds:</strong>
                              <span>{{$item->bedrooms}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Baths:</strong>
                              <span>{{$item->bathrooms}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <strong>Garage:</strong>
                              <span>{{$item->garage}}</span>
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
                          {{$item->short_desc}}
                        </p>
                        <p class="description color-text-a no-margin">
                          {{$item->long_desc}}
                        </p>
                      </div>
                      <div class="mt-5">
                        <a class="btn btn-primary" href="{{route('buy.finished.property', $item->id)}}">Buy Now</a>
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
                {{-- <div class="col-md-10 offset-md-1">
                  <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-plans-tab" data-bs-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                      <iframe src="{{$item->property_video}}" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                      <img src="assets/img/plan2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                      <iframe src="{{$item->property_video}}" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="col-md-12">
                  <div class="row section-t3">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Contact Agent</h3>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-4">
                      <img src="assets/img/agent-4.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="property-agent">
                        <h4 class="title-agent">Anabella Geller</h4>
                        <p class="color-text-a">
                          Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                          dui. Quisque velit nisi,
                          pretium ut lacinia in, elementum id enim.
                        </p>
                        <ul class="list-unstyled">
                          <li class="d-flex justify-content-between">
                            <strong>Phone:</strong>
                            <span class="color-text-a">(222) 4568932</span>
                          </li>
                          <li class="d-flex justify-content-between">
                            <strong>Mobile:</strong>
                            <span class="color-text-a">777 287 378 737</span>
                          </li>
                          <li class="d-flex justify-content-between">
                            <strong>Email:</strong>
                            <span class="color-text-a">annabella@example.com</span>
                          </li>
                          <li class="d-flex justify-content-between">
                            <strong>Skype:</strong>
                            <span class="color-text-a">Annabela.ge</span>
                          </li>
                        </ul>
                        <div class="socials-a">
                          <ul class="list-inline">
                            <li class="list-inline-item">
                              <a href="#">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                              </a>
                            </li>
                            <li class="list-inline-item">
                              <a href="#">
                                <i class="bi bi-twitter" aria-hidden="true"></i>
                              </a>
                            </li>
                            <li class="list-inline-item">
                              <a href="#">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                              </a>
                            </li>
                            <li class="list-inline-item">
                              <a href="#">
                                <i class="bi bi-linkedin" aria-hidden="true"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                      <div class="property-contact">
                        <form class="form-a">
                          <div class="row">
                            <div class="col-md-12 mb-1">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                              </div>
                            </div>
                            <div class="col-md-12 mb-1">
                              <div class="form-group">
                                <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                              </div>
                            </div>
                            <div class="col-md-12 mb-1">
                              <div class="form-group">
                                <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                              </div>
                            </div>
                            <div class="col-md-12 mt-3">
                              <button type="submit" class="btn btn-a">Send Message</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </section>   
          @endforeach 
          {{-- <div class= 'container mt-5'>
            <div class = 'row'>
              {!!$property->links()!!}
            </div>
          </div> --}}
    </main>


@endsection