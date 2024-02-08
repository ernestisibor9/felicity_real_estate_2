@extends('frontpage.dashboard')


@section('main')

  @section('title')
    Felicity Properties - Book Inspection
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
                  <h2 class="title-a">Book An Inspection</h2>
                  <p>Hi! Would you mind taking 5minutes to complete this form? It would be great if you can submit your response Asap for quick Turn around time. Thank you!</p>
                </div>
              </div>
              {{-- <h5 class="text-center text-dark">Please fill the form below </h5> --}}
            </div>
          </div>
          <form action="{{route('store.inspect.property')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Name *" required="">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email *" required="">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Date of Inspection</label>
                <div class="form-group">
                  <input name="inspection_date" type="date" class="form-control form-control-lg form-control-a" placeholder="Pick a date *" required="">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Time of Inspection</label>
                <div class="form-group">
                  <input name="inspection_time" type="time" class="form-control form-control-lg form-control-a" placeholder="Pick a time *" required="">
                </div>
              </div>
              
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="phone" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Phone Number *" required="">
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="message" class="form-control" cols="45" rows="4" placeholder="Message" required=""></textarea>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="property_id" type="hidden" class="form-control form-control-lg form-control-a" value="{{$pid->id}}">
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-a">Submit </button>
              </div>
            </div>
          </form>
        </div>
      </section>
  
        </main>
@endsection