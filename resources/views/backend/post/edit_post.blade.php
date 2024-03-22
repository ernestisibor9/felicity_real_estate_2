@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Edit Post
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Post</h6>
				<hr>
				<form action="{{ route('update.post') }}" method="post" enctype="multipart/form-data">
					@csrf
                    <input type="hidden" name="id" value="{{$editPost->id}}">
                    <input type="hidden" name="post_img" value="{{$editPost->post_image}}">
					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Post title</label>
                                <input type="text" class="form-control" value="{{$editPost->post_title}}" id="input8" name="post_title">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Blog Category</label>
                                <select id="input7" class="form-select" name="blog_cat_id">
                                    <option selected="" disabled>Select Category</option>
                                    @foreach ($blogcat as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id === $editPost->blog_cat_id ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Short Description</label>
                                <textarea class="form-control"  rows="4" name="short_desc">{{$editPost->short_desc}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Post tag</label>
                                <input type="text" class="form-control" name="post_tag" data-role="tagsinput" value="{{$editPost->post_tag}}">
                            </div>
                            <div class="col-md-12">
                                <label for="">Long Description</label>
                                <textarea class="form-control"  id="mytextarea" rows="3" name="long_desc">{!!$editPost->long_desc!!}</textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Post Photo</label>
                                <input type="file" name="post_image" class="form-control @error('post_image')is-invalid @enderror" id="image">
                                <div class="mt-2">
                                @error('post_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <img src="{{asset($editPost->post_image)}}" id="showImage" alt="" width="90px" height="90px">
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