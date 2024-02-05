@extends('admin.admin_dashboard')

@section('admin')

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Testimonial</h6>
				<hr>
				<form action="{{ route('update.testimonial') }}" method="post" enctype="multipart/form-data">
					@csrf
                    <input type="hidden" name="id" value="{{$editTestimonial->id}}">
					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Name</label>
                                <input type="text" class="form-control" id="input8" name="name" value="{{$editTestimonial->name}}">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="">Message</label>
                                <textarea class="form-control"  rows="4" name="message">{{$editTestimonial->message}}</textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label"> Photo</label>
                                <input type="file" name="photo" id="image" class="form-control">
                                <div class="mt-2"></div>
                                <div>
                                    <img src="{{asset($editTestimonial->photo)}}" id="showImage" alt="" width="90px" height="90px">
                                </div>
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