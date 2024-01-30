@extends('admin.admin_dashboard')

@section('admin')

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Property Category</h6>
				<hr>
				<form action="{{ route('update.category') }}" method="post" enctype="multipart/form-data">
					@csrf
                    <input type="hidden" name="id" value="{{$propertyCategory->id}}">
					<div class="card">
						<div class="card-body">
							<select class="form-select mb-3 form-group" name="category_name" aria-label="Default select example">
								<option selected="" disabled>Select Category Name</option>
                                @foreach ($propertyCat as $item)
                                    <option value="{{$item->category_name}}" {{$item->category_name == $propertyCategory->category_name ? 'selected' : ''}}>{{$item->category_name}}</option>
                                @endforeach
							</select>
							<div class="col-md-6 form-group">
                                <label for="input2" class="form-label">Property Photo</label>
                                <input type="file" name="photo" class="form-control" id="image">
                                    
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <img src="{{asset($propertyCategory->photo)}}" id="showImage" alt="" width="90px" height="90px">
                                </div>
                            </div>
							<div class="col-md-12">
								<label for="input1" class="form-label">City</label>
								<select id="input7" class="form-select form-group" name="city_id">
									<option selected="" disabled>Select City</option>
									@foreach ($propertyCat as $city)
										<option value="{{ $city->city_id }}" {{$city->city_id === $propertyCategory->city_id ? 'selected' : ''}}>{{ $city->property->city }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-12">
								<label for="input1" class="form-label">Price</label>
								<select id="input7" class="form-select form-group " name="price">
									<option selected="" disabled>Selct Price Range</option>
									@foreach ($propertyCat as $price)
										<option value="{{ $price->price }}" {{$price->price === $propertyCategory->price ? 'selected' : ''}}>&#8358;{{ $price->price }}</option>
									@endforeach
								</select>
							</div>
							<div class="mt-3">
								<button type="submit" class="btn btn-primary">Update</button>
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

<script>
    $(document).ready(function(){
      $('#image').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result)
        }
        reader.readAsDataURL(e.target.files['0']);
      })
    })
  </script>

@endsection