@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Edit Role
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Role</h6>
				<hr>
				<form action="{{ route('update.roles') }}" method="post">
					@csrf
					<input type="hidden" name="id" id="id" value="{{ $role->id }}">
					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Role Name <span style="color: red;">*</span></label>
                                <input type="text" required class="form-control" id="input8" name="name" value="{{$role->name}}">
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