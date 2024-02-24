@extends('frontpage.dashboard')


@section('main')

  @section('title')
  Felicity Properties - Buy Finished Property
  @endsection

		<main id="main">
             <!-- =======Intro Single ======= -->
    <!-- End Intro Single-->

      <section class="section-services section-t8">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
                <img src="{{asset($property->property_thumbnail)}}" alt=""  width="300px" height="300px" >
            </div>
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-4">
                <h6>Property Name:</h6> <span> {{$property->property_name}}</span>
                <h6>Property Type:</h6> <span>{{$property->type->type_name}}</span>
                <h6>Property Category:</h6> <span>{{$property->property_category}}</span>
                <h6>Price:</h6> <span>&#8358;{{number_format($property->price)}}</span>
                <h6>No. of Bedroom:</h6> <span>{{$property->bedrooms}}</span>
                <h6>No. of Bathroom:</h6> <span>{{$property->bathrooms}}</span>
            </div>
            <div class="col-md-4">
                <h6>No. of Garage:</h6> <span>{{$property->garage}}</span>
                <h6>Location:</h6> <span>{{$property->citys->city}}</span>
                {{-- <h6>Address:</h6> <span>{{$property->address}}</span> --}}
                <h6>State:</h6> <span>{{$property->state}}</span>
            </div>
          </div>
          <h5 class="text-center mt-5">Please fill the form below</h5>
          <form action="{{route('store.finished.buy')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="buy_category" id="" value="{{$property->property_category}}">
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="text" name="title" class="form-control form-control-lg form-control-a" placeholder="Title (Mr., Mrs, Ms, Prof. Dr. Chief, other, etc) *"  required=""> 
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="surname" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Surname *" required="">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="firstname" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Firstname *" required="">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email *" required="">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="phone" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Phone Number *" required="">
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <div class="form-group">
                    <select name="employment_status" id="" class="form-select form-control-lg form-control-a" >
                        <option value="">What is your employment status, and can you provide proof of Income or letter of employment? *</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="maybe">Maybe</option>
                    </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <select name="background_checks" id="" class="form-select form-control-lg form-control-a" >
                    <option value="">Are you comfortable with background checks or reference checks?</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="additional_information" class="form-control" cols="45" rows="4" placeholder="Any additional information you want to provide for the Apartment" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="additional_requests" class="form-control" cols="45" rows="4" placeholder="Additional requests" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-a">Send </button>
              </div>
            </div>
          </form>
        </div>
      </section>
  
        </main>
@endsection