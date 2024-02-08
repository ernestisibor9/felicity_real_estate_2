@extends('frontpage.dashboard')


@section('main')

    @section('title')
    Felicity Properties - Unfinished Property
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
                  <h2 class="title-a">UnFinished Property </h2>
                </div>
              </div>
              <h5 class="text-center text-dark">Please fill the form below </h5>
            </div>
          </div>
          <form action="{{route('store.unfinished.buy')}}" method="post" enctype="multipart/form-data">
            @csrf

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
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <select name="ptype_id" id="" class="form-select form-control-lg form-control-a" >
                    <option value="" disabled>Select Property Type *</option>
                    @foreach ($propertyTypes as $ptype)
                        <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <select name="budget" id="" class="form-select form-control-lg form-control-a" >
                    <option value="">Select Budget For Apartment *</option>
                    <option value="0-500000">0 - 500,000 Per Anual (P.A)</option>
                    <option value="500,000 - 1,000,000">500,000 - 1,000,000 Per Anual (P.A)</option>
                    <option value="1,000,000 - 2,000,000">1,000,000 - 2,000,000 (P.A)</option>
                    <option value="2,000,000 - 3,000,000">2,000,000 - 3,000,000 Per Anual (P.A)</option>
                    <option value="3,000,000 - 4,000,000">3,000,000 - 4,000,000 Per Anual (P.A)</option>
                    <option value="4,000,000 - 5,000,000">4,000,000 - 5,000,000 Per Anual (P.A)</option>
                    <option value="5,000,000 - 7,000,000">5,000,000 - 7,000,000 Per Anual (P.A)</option>
                    <option value="Above 7,000,000">Above 7,000,000 Per Anual (P.A)</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <select name="city_id" id="" class="form-select form-control-lg form-control-a" >
                    <option value="">Select City *</option>
                    @foreach ($property as $city)
                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="amenities" class="form-control" cols="45" rows="4" placeholder="Are there specific amenities you consider essential (e.g., parking space, laundry facilities, pet-friendly)?" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="state_of_community" class="form-control" cols="45" rows="4" placeholder="Are you looking for properties in a specific type of community (e.g., family-friendly, vibrant, quiet)?" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="property_size" class="form-control" cols="45" rows="4" placeholder="What are your preferences regarding property size and layout?" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="design_preferences" class="form-control" cols="45" rows="4" placeholder="Do you have any specific aesthetic or design preferences for the property?" required=""></textarea>
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