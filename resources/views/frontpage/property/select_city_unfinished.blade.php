@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Select City
      @endsection
    <main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Select Location</h1>
              <span class="color-text-a"></span>
            </div>
          </div>
          {{-- <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  News Grid
                </li>
              </ol>
            </nav>
          </div> --}}
        </div>
      </div>
    </section><!-- End Intro Single-->
        <section class="">
            <div class="container">
              <div class="row justify-content-center">
                    {{-- <select onchange="window.location.href=this.value;" class="form-select mb-5">
                          <option value=''>Select Location</option>
                            <option value="{{route('Lekki')}}">Lekki</option>
                            <option value="">Onirun</option>
                    </select>  --}}
                      <div class='col-md-8'>
                        <form method= 'post' action='{{route('search.property.city2')}}' class="row g-3">
                        @csrf
                        <div class= 'col-md-7 col-auto'>
                        <select name='city_id' class="form-select mb-5" required>
                        <option value=''>Select Location</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach
                        </select> 
                        </div>
                         <div class="col-auto">
                          <button type="submit" class="btn btn-success mb-3">Search</button>
                        </div>
                    </form>
                      </div>

                     {{-- <img src='{{asset('frontend/assets/img/pic.jpg')}}' alt= ''class= 'img-fluid'/> --}}

                  {{-- <div class = 'col-md-6'>
                    <img src='{{asset('frontend/assets/img/pic.jpg')}}' alt= ''class= 'img-fluid'/>
                  </div> --}}
              </div>
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection