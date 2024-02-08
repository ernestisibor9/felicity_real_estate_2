@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Property
@endsection

<div class="page-wrapper">
		<div class="page-content">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<h6 class="mb-0 text-uppercase">Add Property</h6>
					<hr>
						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4"></h5>
								<form class="row g-3" method="post" id="myForm" action="{{ route('store.property') }}" enctype="multipart/form-data">
									@csrf

									<div class="col-md-6 form-group">
										<label for="input1" class="form-label">Property Name</label>
										<input type="text" name="property_name" class="form-control" id="input1" placeholder="Property Name">
									</div>
									<div class="col-md-6 form-group">
										<label for="input2" class="form-label">Property Status</label>
										<select id="input7" class="form-select" name="property_status">
											<option selected="" disabled>Select Property Status</option>
											<option value="buy">For Buy</option>
											<option value="rent">For Rent</option>
											<option value="let">For Let</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label for="input2" class="form-label">Price</label>
										<select id="input7" class="form-select" name="price">
											<option selected="" disabled>Select Price Range</option>
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
											<option selected="" disabled>Select Property Category</option>
											<option value="finished_property">Finished Property</option>
											<option value="unfinished_property">Unfinished Property</option>
											<option value="land">Land</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label for="input2" class="form-label">Property Thumbnail Photo</label>
										<input type="file" name="property_thumbnail" class="form-control" id="input1" onChange="mainThamUrl(this)">
										<div class="mt-2"></div>
											<img src="" id="mainThmb">
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Multipe Image</label>
										<input type="file" name="multi_img[]" id="multiImg" class="form-control" id="input1" multiple="">
										<div class="mt-2"></div>
											<div class="row" id="preview_img"></div>
									</div>
									<div class="col-md-6">
										<label for="input1" class="form-label">No. of Bedrooms</label>
										<input type="number" name="bedrooms" class="form-control" id="input1" >
									</div>
									<div class="col-md-6">
										<label for="input1" class="form-label">No. of Bathrooms</label>
										<input type="number" name="bathrooms" class="form-control" id="input1">
									</div>
									<div class="col-md-6">
										<label for="input1" class="form-label">No. of Garage</label>
										<input type="number" name="garage" class="form-control" id="input1">
									</div>
									<div class="col-md-6">
										<label for="input1" class="form-label">Property Size</label>
										<input type="text" name="property_size" class="form-control" id="input1">
									</div>
									<div class="col-md-6">
										<label for="input1" class="form-label">Property Video</label>
										<input type="text" name="property_video" class="form-control" id="input1">
									</div>
									<div class="col-md-6">
										<label for="input1" class="form-label">Property Type</label>
										<select id="input7" class="form-select form-group" name="ptype_id">
											<option selected="" disabled>Select Property Type</option>
											@foreach ($propertyTypes as $ptype)
												<option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
											@endforeach
										</select>
									</div>
									
									<div class="col-md-6">
										<label for="input8" class="form-label">City</label>
										<input type="text" class="form-control" id="input8" name="city" placeholder="City">
									</div>
									<div class="col-md-6">
										<label for="input9" class="form-label">State</label>
										<select id="input9" class="form-select" name="state">
											<option selected="">Select State</option>
											<option>Lagos</option>
											<option>Abuja</option>
											<option>Kano</option>
											<option>Anambra</option>
											<option>Rivers</option>
											<option>Edo</option>
											<option>Oyo</option>
											<option>Ogun</option>
										</select>
									</div>
									<div class="col-md-12">
										<label for="input11" class="form-label">Address</label>
										<textarea class="form-control" id="input11" placeholder="Address ..." rows="3" name="address"></textarea>
									</div>
									<div class="col-md-12">
										<label for="input11" class="form-label">Short Description</label>
										<textarea class="form-control" id="input11" rows="2" name="short_desc"></textarea>
									</div>
									<div class="col-md-12">
										<label for="input11" class="form-label">Long Description</label>
										<textarea class="form-control" id="input11" rows="4" name="long_desc"></textarea>
									</div>
									<div class="col-md-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="input12" value="1" name="featured">
											<label class="form-check-label" for="input12" name="short_desc">Featured</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="input12" value="1" name="hot">
											<label class="form-check-label" for="input12" name="short_desc">Hot</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
				</div>
			</div>
		</div>
</div>

 <script type="text/javascript">
    function mainThamUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    } 
 </script>

 <script> 
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpeg|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
  </script>

	<!-- Validate js -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                property_name: {
                    required : true,
                },
								property_status: {
                    required : true,
                }, 
								price: {
                    required : true,
                },
								property_category: {
                    required : true,
                },
								property_thumbnail:{
										required: true
								},
								ptype_id:{
									required: true
								}
                
            },
            messages :{
                property_name: {
                    required : 'Please Enter Property Name',
                }, 
                property_status: {
                    required : 'Please Select Property Status',
                },
								price: {
                    required : 'Please Select Price',
                },
								property_category: {
                    required : 'Please Select Property Category',
                },
								property_thumbnail:{
									required : 'Please Upload a Thumbnail Photo',
								},
								ptype_id:{
									required : 'Please Select a Property Type',
								}

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
	<!-- End Validate js -->

@endsection