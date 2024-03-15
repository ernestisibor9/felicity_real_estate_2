@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Roles
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Roles in Permission</h6>
				<hr>
				<form action="{{ route('store.roles') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Role Name <span style="color: red;">*</span></label>
                                 <select name="role_id" id="" class="form-select">
                                    <option value="">Select Role Name</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class= 'col-md-12 mt-4'>
                                <div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">Default All Permission</label>
								</div>
                            </div>
                            <hr>
                            @foreach ($permissions_groups as $group)
                                <div class='row'>
                                    <div class= 'col-md-3 mt-4'>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">{{$group->group_name}}</label>
                                    </div>
                                </div>
                                @php
                                    $permission = App\Models\User::getPermissionByGroupName($group->group_name)
                                @endphp

                                <div class= 'col-md-9 mt-4'>
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            @endforeach

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