  @php
    $sliders = App\Models\Carousel::latest()->limit(3)->get();  
  @endphp  
  
  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="quick-link-container">

      <h1>Find your next home</h1>
      
      <div>
       <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buy</a>
          <div class="dropdown-menu">
            <a class="dropdown-item " href="{{route('finished.property')}}">Finished Property</a>
            {{-- <a class="dropdown-item " href="{{route('finished.property2')}}">Finished Property2</a> --}}
            <a class="dropdown-item " href="{{route('unfinished.property')}}">Unfinished Property</a>
            <a class="dropdown-item " href="{{route('land.property')}}">Land</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rent</a>
          <div class="dropdown-menu">
            <a class="dropdown-item " href="{{route('tenant.page')}}">Tenant</a>
            <a class="dropdown-item " href="{{route('buy.tenant.property')}}">Investor</a>
            <!-- <a class="dropdown-item " href="agents-grid.html">Agents Grid</a>
            <a class="dropdown-item " href="agent-single.html">Agent Single</a> -->
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Short Let</a>
          <div class="dropdown-menu">
            <a class="dropdown-item " href="property-single.html">Property Single</a>
            <a class="dropdown-item " href="blog-single.html">Blog Single</a>
            <a class="dropdown-item " href="agents-grid.html">Agents Grid</a>
            <a class="dropdown-item " href="agent-single.html">Agent Single</a>
          </div>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Book An Inspection</a>
          <div class="dropdown-menu">
            <a class="dropdown-item " href="">Buy</a>
            <a class="dropdown-item " href="{{route('inspect.rent')}}">Rent</a>
          </div>
        </li> --}}
       </ul>
      </div>
    </div>
    
    <div class="swiper-wrapper">

      {{-- <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('frontend/assets/img/slide-1.jpg') }} )">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">204 </span> Mount
                      <br> Olive Road Two
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('frontend/assets/img/slide-2.jpg') }})">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345
                    </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Rino
                      <br> Venda Road Five
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      @foreach ($sliders as $slide)
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset($slide->photo_slide) }} )">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">{{$slide->property_name}}
                      <br> 
                    </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b"></span> {{$slide->property_name}}
                      <br> {{$slide->city}}
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a"> &#8358; {{$slide->price}}</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->