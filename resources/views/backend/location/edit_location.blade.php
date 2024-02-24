@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Edit Location
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Location</h6>
				<hr>
				<form action="{{ route('update.location') }}" method="post">
					@csrf
					<input type="hidden" name="id" id="id" value="{{ $editLocation->id }}">
					<div class="card">
						<div class="card-body">
							 <input type='text' class= 'form-control mb-3' name= 'city' placeholder='E.g Lekki' value="{{$editLocation->city}}"/>

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