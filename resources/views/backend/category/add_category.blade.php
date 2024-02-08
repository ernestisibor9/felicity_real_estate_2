@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Category
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Property Category</h6>
				<hr>
				<form action="{{ route('store.category') }}" method="post" id="myForm" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
							<select class="form-select mb-3 form-group @error('category_name')
                          is-invalid
                          @enderror" name="category_name" aria-label="Default select example">
								<option selected="" disabled>Select Category Name</option>
								<option value="finished property">Finished Property</option>
								<option value="unfinished property">Unfinished Property </option>
								<option value="land">Land</option>
							</select>
							<div>
								@error('category_name')
                            		<span class="text-danger">{{ $message }}</span>
                          		@enderror
							</div>
							<div class="col-md-12 form-group">
								<label for="input2" class="form-label">Property Photo</label>
								<input type="file" name="photo" class="form-control @error('photo')
								is-invalid
								@enderror" id="input1" onChange="mainThamUrl(this)">
								<div>
									@error('photo')
										<span class="text-danger">{{ $message }}</span>
									  @enderror
								</div>
								<div class="mt-2"></div>
									<img src="" id="mainThmb">
							</div>
							<div class="col-md-12">
								<label for="input1" class="form-label">City</label>
								<select id="input7" class="form-select form-group @error('city_id')
								is-invalid
								@enderror" name="city_id">
									<option selected="" disabled>Select City</option>
									@foreach ($property as $city)
										<option value="{{ $city->id }}">{{ $city->city }}</option>
									@endforeach
								</select>
								<div>
									@error('city_id')
										<span class="text-danger">{{ $message }}</span>
									  @enderror
								</div>
							</div>
							<div class="col-md-12">
								<label for="input1" class="form-label">Price</label>
								<select id="input7" class="form-select form-group @error('price')
								is-invalid
								@enderror" name="price">
									<option selected="" disabled>Selct Price Range</option>
									<option value="100000-200000">&#8358;1000000 - 	&#8358;2000000</option>
									<option value="300000-400000">&#8358;3000000 - 	&#8358;4000000</option>
									<option value="5000000-6000000">&#8358;5000000 - 	&#8358;6000000</option>
									<option value="7000000-6800000">&#8358;7000000 - 	&#8358;8000000</option>
								</select>
								<div>
									@error('price')
										<span class="text-danger">{{ $message }}</span>
									  @enderror
								</div>
							</div>
							<div class="mt-3">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</div>
					</div>
				</form>
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


	<!-- Validate js -->
	<script type="text/javascript">
		$(document).ready(function (){
			$('#myForm').validate({
				rules: {
					category_name: {
						required : true,
					},
					photo: {
						required : true,
					}, 
					city_id: {
						required : true,
					},
					price: {
						required : true,
					}
				},
				messages :{
					category_name: {
						required : 'Please Enter Category Name',
					}, 
					photo: {
						required : 'Please Select Property Photo',
					},
					city_id: {
						required : 'Please Select City',
					},
					price: {
						required : 'Please Select Price',
					},
	
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