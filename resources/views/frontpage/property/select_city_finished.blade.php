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
                  <div class= 'col-md-8'>
                    <select onchange="window.location.href=this.value;" class="form-select mb-5">
                          <option value=''>Select Location</option>
                            <option value="{{route('Lekki')}}">Lekki</option>
                            <option value="">Onirun</option>
                    </select> 
                     <img src='{{asset('frontend/assets/img/pic.jpg')}}' alt= ''class= 'img-fluid'/>
                  </div>
                  {{-- <div class = 'col-md-6'>
                    <img src='{{asset('frontend/assets/img/pic.jpg')}}' alt= ''class= 'img-fluid'/>
                  </div> --}}
              </div>
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection