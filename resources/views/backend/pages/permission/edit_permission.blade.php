@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Edit Permission
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Permission</h6>
				<hr>
				<form action="{{ route('update.permission') }}" method="post">
					@csrf
					<input type="hidden" name="id" id="id" value="{{ $permission->id }}">
					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Permission Name <span style="color: red;">*</span></label>
                                <input type="text" required class="form-control" id="input8" name="name" value="{{$permission->name}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Group Name</label>
                                <select name="group_name" id="" class="form-select">
                                    <option value="" disabled>Select Permission Group</option>
                                    <option value="type" {{$permission->group_name == "type" ? 'selected' : ''}}>Property Type</option>
                                    <option value="location" {{$permission->group_name == "location" ? 'selected' : ''}}>Location</option>
                                    <option value="category" {{$permission->group_name == "category" ? 'selected' : ''}}>Blog Category</option>
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

@endsection