@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Testimonial
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Testimonial</h6>
				<hr>
				<form action="{{ route('store.testimonial') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Name</label>
                                <input type="text" class="form-control" id="input8" name="name" placeholder="Full Name">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="">Message</label>
                                <textarea class="form-control"  rows="4" name="message"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Testimonial Photo</label>
                                <input type="file" name="photo" class="form-control" id="input1" onChange="mainThamUrl(this)">
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