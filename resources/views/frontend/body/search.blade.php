@php
    $property = App\Models\Property::latest()->get();
    $propertyType = App\Models\PropertyType::latest()->get();
@endphp

<!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" action="{{route('search.property')}}" method="post">
        @csrf
        <div class="row">
          @php
              $ptypes = App\Models\PropertyType::orderBy('type_name', 'ASC')->get();
          @endphp
          <div class="col-md-12 mb-4 mt-3">
            <div class="form-group">
              <label class="pb-2" for="Type">Select Category</label>
              <select name= 'ptype_id' class= 'form-select'>
                @foreach ($ptypes as $ptype)
                    <option value = "{{$ptype->type_name}}">{{$ptype->type_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @php
              $cities = App\Models\City::orderBy('city', 'ASC')->get();
          @endphp
          <div class="col-md-12 mb-4 mt-3">
            <div class="form-group">
              <label class="pb-2" for="Type">Select City</label>
              <select name= 'city_id' class= 'form-select'>
                @foreach ($cities as $city)
                    <option value = "{{$city->city}}">{{$city->city}}</option>
                @endforeach
              </select>
            </div>
          </div>
          {{-- <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">State</label>
              <input type="text" name="state" class="form-control form-control-lg form-control-a" placeholder="State" >
            </div>
          </div> --}}
          {{-- <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Property Category</label>
              <select name="property_category" class="form-control form-select form-control-a" id="">
                  <option value="">Select Property Category</option>
                  <option value="finished_property">Finished Property</option>
                  <option value="unfinished_property">Unfinished Property</option>
                  <option value="land">Land</option>
              </select>
            </div>
          </div>

          <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Property Type</label>
                <select class="form-select mb-3" name="ptype_id" aria-label="Default select example">
                  <option selected="" disabled>Select Property Type</option>
                  <option value="duplex">Duplex</option>
                  <option value="luxury">Luxury Apartment </option>
                  <option value="2 bedroom">2 Bedroom</option>
                  <option value="3 bedroom">3 Bedroom</option>
                  <option value="studio apartment">Studio Apartment</option>
                  <option value="townhouse">Townhouse</option>
                  <option value="mansion">Mansion</option>
                  <option value="other">Other</option>
                </select>
              </div>
          </div> --}}

          {{-- <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Buy/Rent/Let</label>
              <select name="property_status" class="form-control form-select form-control-a" id="bedrooms">
                  <option value="buy">Buy</option>
                  <option value="rent">Rent</option>
                  <option value="let">Let</option>
              </select>
            </div>
          </div> --}}
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->