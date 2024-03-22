@extends('admin.admin_dashboard')

@section('admin')

@section('title')
    Felicity Properties - Edit Property
@endsection

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h6 class="mb-0 text-uppercase">Edit Property</h6>
                <hr>
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4"></h5>
                        <form class="row g-3" method="post" id="myForm" action="{{ route('update.property') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="" value="{{ $property->id }}">
                            <input type="hidden" name="property_photo" id="" value="{{ $property->property_thumbnail }}">
                            <div class="col-md-6 form-group">
                                <label for="input1" class="form-label">Property Name</label>
                                <input type="text" name="property_name" class="form-control" id="input1"
                                    placeholder="Property Name" value="{{ $property->property_name }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="input2" class="form-label">Property Status</label>
                                <select id="input7" class="form-select" name="property_status">
                                    <option selected="" disabled>Select Property Status</option>
                                    @foreach ($propertyAll as $item)
                                        <option value="{{ $item->property_status }}"
                                            {{ $item->property_status == $property->property_status ? 'selected' : '' }}>
                                            {{ $item->property_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="input2" class="form-label">Price</label>
                                <select id="input7" class="form-select" name="price">
                                    <option selected="" disabled>Select Price Range</option>
                                    {{-- @foreach ($propertyAll as $item)
												<option value="{{$item->price}}"{{$item->price == $property->price ? 'selected': ''}}>{{$item->price}}</option>
											@endforeach --}}

                                    <option value="{{ $property->price }}"{{ $property->price ? 'selected' : '' }}>
                                        {{ $property->price }}</option>
                                    <option value="1m-2m">&#8358;1m - &#8358;2m</option>
                                    <option value="3m-4m">&#8358;3m - &#8358;4m</option>
                                    <option value="5m-6m">&#8358;5m - &#8358;6m</option>
                                    <option value="7m-8m">&#8358;7m - &#8358;8m</option>
                                    <option value="9m-10m">&#8358;9m - &#8358;10m</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="input1" class="form-label">Property Category</label>
                                <select id="input7" class="form-select" name="property_category">
                                    <option selected="" disabled>Select Price Range</option>
                                    {{-- @foreach ($propertyAll as $item)
												<option value="{{$item->property_category}}"{{$item->property_category == $property->property_category ? 'selected': ''}}>{{$item->property_category}}</option>
											@endforeach --}}
                                    <option
                                        value="{{ $property->property_category }}"{{ $property->property_category ? 'selected' : '' }}>
                                        {{ ucfirst($property->property_category) }}</option>
                                    <option value="finished_property">Finished Property</option>
                                    <option value="unfinished_property">Unfinished Property</option>
                                    <option value="land">Land</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="input2" class="form-label">Property Thumbnail Photo</label>
                                <input type="file" name="property_thumbnail"
                                    class="form-control @error('property_thumbnail')is-invalid @enderror"
                                    id="image">

                            </div>
                            <div class="col-md-6">
                                @error('property_thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div>
                                    <img src="{{ asset($property->property_thumbnail) }}" id="showImage" alt=""
                                        width="90px" height="90px">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">No. of Bedrooms</label>
                                <input type="number" name="bedrooms" class="form-control" id="input1"
                                    value="{{ $property->bedrooms }}">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">No. of Bathrooms</label>
                                <input type="number" name="bathrooms" class="form-control" id="input1"
                                    value="{{ $property->bathrooms }}">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">No. of Garage</label>
                                <input type="number" name="garage" class="form-control" id="input1"
                                    value="{{ $property->garage }}">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Property Size</label>
                                <input type="text" name="property_size" class="form-control" id="input1"
                                    value="{{ $property->property_size }}">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Property Video</label>
                                <input type="text" name="property_video" class="form-control" id="input1"
                                    value="{{ $property->property_video }}">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Property Type</label>
                                <select id="input7" class="form-select form-group" name="ptype_id">
                                    <option selected="" disabled>Select Property Type</option>
                                    @foreach ($propertyTypes as $ptype)
                                        <option value="{{ $ptype->id }}"
                                            {{ $ptype->id == $property->ptype_id ? 'selected' : '' }}>
                                            {{ $ptype->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="input8" class="form-label">Location</label>
                                <select id="input9" class="form-select" name="city_id">
                                    <option selected="" disabled>Select City</option>
                                    @foreach ($cityAll as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $property->city_id ? 'selected' : '' }}>
                                            {{ $item->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="input9" class="form-label">State</label>
                                <select id="input9" class="form-select" name="state">
                                    <option selected="" disabled>Select State</option>
                                    @foreach ($propertyState as $item)
                                        <option value="{{ $item->state }}"
                                            {{ $item->state == $property->state ? 'selected' : '' }}>
                                            {{ $item->state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="input11" class="form-label">Address</label>
                                <textarea class="form-control" id="input11" placeholder="Address ..." rows="3" name="address">{{ $property->address }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="input11" class="form-label">Short Description</label>
                                <textarea class="form-control" id="input11" rows="2" name="short_desc">{{ $property->short_desc }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="input11" class="form-label">Long Description</label>
                                <textarea class="form-control" id="input11" rows="4" name="long_desc">{{ $property->long_desc }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="input12" value="1"
                                        name="featured" {{ $property->featured == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="input12" name="short_desc">Featured</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="input12" value="1"
                                        name="hot" {{ $property->featured == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="input12" name="short_desc">Hot</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpeg|png|webp)$/i.test(file
                        .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(100)
                                    .height(80); //create image element 
                                $('#preview_img').append(
                                img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

@endsection
