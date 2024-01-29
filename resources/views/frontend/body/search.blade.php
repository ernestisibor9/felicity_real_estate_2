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
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Property Name</label>
              <input type="text" name="property_name" class="form-control form-control-lg form-control-a" placeholder="Search name" required>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select name="ptype_id" class="form-control form-select form-control-a" id="Type">
                @foreach ($propertyType as $ptype)
                    <option value="{{$ptype->type_name}}">{{$ptype->type_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">City</label>
              <select name="city" class="form-control form-select form-control-a" id="city">
                @foreach ($property as $location)
                    <option value="{{$location->city}}">{{$location->city}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Buy/Rent/Let</label>
              <select name="property_status" class="form-control form-select form-control-a" id="bedrooms">
                @foreach ($property as $property_status)
                    <option value="{{$property_status->property_status}}">{{$property_status->property_status}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->