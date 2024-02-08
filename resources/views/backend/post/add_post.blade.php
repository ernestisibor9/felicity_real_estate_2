@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Post
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Post</h6>
				<hr>
				<form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Post title <span style="color: red;">*</span></label>
                                <input type="text" required class="form-control" id="input8" name="post_title" placeholder="Post title">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Blog Category <span style="color: red;">*</span></label>
                                <select id="input7" required class="form-select" name="blog_cat_id">
                                    <option selected="" disabled>Select Category</option>
                                    @foreach ($blogcat as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Short Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" required rows="4" name="short_desc"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Post tag</label>
                                <select name="post_tag" id="" class="form-select">
                                    <option value="">Select Post Tags</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Business">Business</option>
                                    <option value="Education">Education</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Sports">Sports</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Long Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" required  id="mytextarea" rows="3" name="long_desc"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Post Photo <span style="color: red;">*</span></label>
                                <input type="file" name="post_image" required class="form-control" id="input1" onChange="mainThamUrl(this)">
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