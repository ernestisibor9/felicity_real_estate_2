@extends('admin.admin_dashboard')

@section('admin')

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Slider</h6>
				<hr>
				<form action="{{ route('store.carousel') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Property Name</label>
                                <input type="text" class="form-control" id="input8" name="property_name" placeholder="Property Name">
                            </div>
                            <div class="col-md-12 form-group">
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
                            <div class="col-md-12">
                                <label for="input8" class="form-label">City</label>
                                <input type="text" class="form-control" id="input8" name="city" placeholder="City">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Property Slider Photo</label>
                                <input type="file" name="photo_slide" class="form-control" id="input1" onChange="mainThamUrl(this)">
                                <div class="mt-2"></div>
                                    <img src="" id="mainThmb">
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
@endsection