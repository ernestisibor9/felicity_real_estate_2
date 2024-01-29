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
                  <h2 class="title-a">Book An Inspection for Rent </h2>
                  <p>Hi! Would you mind taking 5minutes to complete this form? It would be great if you can submit your response Asap for quick Turn around time. Thank you!</p>
                </div>
              </div>
              {{-- <h5 class="text-center text-dark">Please fill the form below </h5> --}}
            </div>
          </div>
          <form action="{{route('store.finished.buy')}}" method="post" enctype="multipart/form-data">
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
                <label for="">Reservation Date</label>
                <div class="form-group">
                  <input name="reservation_date" type="date" class="form-control form-control-lg form-control-a" placeholder="Reservation Date *" required="">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <input name="property_size_layout" type="text" class="form-control form-control-lg form-control-a" placeholder="What are your preferences regarding property size and layout? *" required="">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Will you be avaliable to come for inspection *</label>
                <div class="form-group">
                  <select name="budget" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Have you ever been evicted or had any rental-related issue in the past*</label>
                <div class="form-group">
                  <select name="evicted_rental_related" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Do you have flexibility with your move-in date?*</label>
                <div class="form-group">
                  <select name="flexible_move_in_date" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Are you open to negotiating lease terms? *</label>
                <div class="form-group">
                  <select name="lease_terms" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">How important is safety and security in your decision-making? *</label>
                <div class="form-group">
                  <select name="safety_decision" id="" class="form-select form-control-lg form-control-a" >
                    <option value="extremely important">Extremely important</option>
                    <option value="somewhat important">Somewhat important</option>
                    <option value="neutral">Neutral</option>
                    <option value="somewhat not important">Somewhat not important</option>
                    <option value="extremely not important">Extremely not important</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Do you have a preferred method for paying rent (monthly, quarterly)? *</label>
                <div class="form-group">
                  <select name="method_for_paying_rent" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Are you open to slight variations in the budget for the right property?</label>
                <div class="form-group">
                  <select name="variation_in_budget" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">Is proximity to public transportation important to you?</label>
                <div class="form-group">
                  <select name="public_transport" id="" class="form-select form-control-lg form-control-a" >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="maybe">Maybe</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="">What is your desired move-in date? </label>
                <div class="form-group">
                  <input name="move_in_date" type="date" class="form-control form-control-lg form-control-a" placeholder="" required="">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="allergies" class="form-control" cols="45" rows="4" placeholder="Please list if you have any allergies" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="areas_or_neighbourhood" class="form-control" cols="45" rows="4" placeholder="In which areas or neighborhoods are you looking for a rental property? *" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="rented_property_before" class="form-control" cols="45" rows="4" placeholder="Have you rented a property before? If yes, what did you like and dislike about your previous rental experience? *" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="past_experience" class="form-control" cols="45" rows="4" placeholder="Are there any specific challenges or preferences based on past experiences?" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="essential_amenities_or_facilities" class="form-control" cols="45" rows="4" placeholder="Are there specific amenities or facilities you would like to be close to (e.g., schools, public transportation, shopping centers)? *" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="amenities" class="form-control" cols="45" rows="4" placeholder="Are there specific amenities you consider essential (e.g., parking space, laundry facilities, pet-friendly)?" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="workplace_commute" class="form-control" cols="45" rows="4" placeholder="Where is your workplace, and how do you plan to commute?" required=""></textarea>
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
                  <textarea name="aesthetic_design" class="form-control" cols="45" rows="4" placeholder="Do you have any specific aesthetic or design preferences for the property?" required=""></textarea>
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
                <button type="submit" class="btn btn-a">Submit </button>
              </div>
            </div>
          </form>
        </div>
      </section>
  
        </main>
@endsection