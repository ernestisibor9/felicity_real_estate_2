@extends('frontpage.dashboard')

<style>
  @media screen and (max-width: 540px) {
  .mob {
    margin-top: 50px;
  }
  .mob-slide{
    margin-top: -120px;
  }
}
</style>

@section('main')
    @section('title')
    Felicity Properties - Testimonial
    @endsection
    <main id="main">
        <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap d-flex justify-content-between mob">
                <div class="title-box">
                  <h2 class="title-a">Testimonials</h2>
                </div>
              </div>
            </div>
          </div>
  
          <div id="testimonial-carousel" class="swiper">
            <div class="swiper-wrapper">
  
              @php
                  $testimonial = App\Models\Testimonial::latest()->limit(4)->get();
              @endphp
  
              @foreach ($testimonial as $test)
              <div class="carousel-item-a swiper-slide mob-slide">
                <div class="testimonials-box">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="testimonial-img">
                        <img src="{{asset($test->photo)}}" alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="testimonial-ico">
                        <i class="bi bi-chat-quote-fill"></i>
                      </div>
                      <div class="testimonials-content">
                        <p class="testimonial-text">
                          {{$test->message}}
                        </p>
                      </div>
                      <div class="testimonial-author-box">
                        <img src="{{asset($test->photo)}}" alt="" class="testimonial-avatar">
                        <h5 class="testimonial-author">{{$test->name}}</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End carousel item -->
              @endforeach
  
  
            </div>
          </div>
          <div class="testimonial-carousel-pagination carousel-pagination"></div>
  
        </div>
      </section><!-- End Testimonials Section -->
    </main>


@endsection