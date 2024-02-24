@extends('frontpage.dashboard')


@section('main')

    @section('title')
    Felicity Properties - Buy Property
    @endsection
		<main id="main">
             <!-- =======Intro Single ======= -->
    <!-- End Intro Single-->

      <section class="section-services section-t8">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap d-flex justify-content-between">
                <div class="title-box">
                  <h2 class="title-a">Select </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <a href="{{route('finished.property')}}">
                <div class="card-box-c foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-bank"></span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h2 class="title-c">Finished Property</h2>
                    </div>
                  </div>
                  <div class="card-body-c">
                    <p class="content-c">
                      
                    </p>
                  </div>
                  <div class="card-footer-c">

                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{route('unfinished.property')}}">
              <div class="card-box-c foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-house"></span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h2 class="title-c">Unfinished Property</h2>
                  </div>
                </div>
                <div class="card-body-c">
                  <p class="content-c">

                  </p>
                </div>
                <div class="card-footer-c">
                </div>
              </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{route('land.property')}}">
              <div class="card-box-c foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-cash"></span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h2 class="title-c">Land</h2>
                  </div>
                </div>
                <div class="card-body-c">
                  <p class="content-c">

                  </p>
                </div>
                <div class="card-footer-c">
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>
      </section>
  
        </main>
@endsection