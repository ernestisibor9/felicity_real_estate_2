@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Permission
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Permission</h6>
				<hr>
				<form action="{{ route('store.permission') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Permission Name <span style="color: red;">*</span></label>
                                <input type="text" required class="form-control" id="input8" name="name" placeholder="Permission Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Group Name</label>
                                <select name="group_name" id="" class="form-select">
                                    <option value="">Select Permission Group</option>
                                    <option value="type">Property Type</option>
                                    <option value="location">Location</option>
                                    <option value="category">Blog Category</option>
                                </select>
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