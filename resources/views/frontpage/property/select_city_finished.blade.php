@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Select City
      @endsection
    <main id="main">
        <section class="mt-5">
            <div class="container mt-5">
              <div class="row justify-content-center">
                <h2 class="text-center" style="margin-top: 80px; margin-bottom:50px;">Select Location</h2>
                    {{-- <select onchange="window.location.href=this.value;" class="form-select mb-5">
                          <option value=''>Select Location</option>
                            <option value="{{route('Lekki')}}">Lekki</option>
                            <option value="">Onirun</option>
                    </select>  --}}
                      <div class='col-md-8'>
                        <form method= 'post' action='{{route('search.property.city')}}' class="row g-3">
                        @csrf
                        <div class= 'col-md-6 col-auto'>
                        <select name='city_id' class="form-select mb-5">
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