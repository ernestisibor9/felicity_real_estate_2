@extends('frontpage.dashboard')


@section('main')
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
              <a href="{{route('buy.tenant.property')}}">
                <div class="card-box-c foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cart"></span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h2 class="title-c">Buy</h2>
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
              <a href="">
              <div class="card-box-c foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-calendar4-week"></span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h2 class="title-c">Rent</h2>
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
              <a href="">
              <div class="card-box-c foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-card-checklist"></span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h2 class="title-c">Let</h2>
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