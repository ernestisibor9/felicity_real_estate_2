@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Edit Property Type
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Property Type</h6>
				<hr>
				<form action="{{ route('update.type') }}" method="post">
					@csrf
					<input type="hidden" name="id" id="id" value="{{ $editTypes->id }}">
					<div class="card">
						<div class="card-body">
							<select class="form-select mb-3" name="type_name" aria-label="Default select example">
								<option selected="" disabled>Select Property Type</option>
								<option value="duplex" {{ $editTypes->type_name == 'duplex' ? 'selected': '' }}>Duplex</option>
								<option value="luxury" {{ $editTypes->type_name == 'luxury' ? 'selected': '' }}>Luxury Apartment </option>
								<option value="2 bedroom" {{ $editTypes->type_name == '2 bedroom' ? 'selected': '' }}>2 Bedroom</option>
								<option value="3 bedroom"{{ $editTypes->type_name == '3 bedroom' ? 'selected': '' }}>3 Bedroom</option>
								<option value="studio apartment"{{ $editTypes->type_name == 'studio apartment' ? 'selected': '' }}>Studio Apartment</option>
								<option value="townhouse"{{ $editTypes->type_name == 'townhouse' ? 'selected': '' }}>Townhouse</option>
								<option value="mansion"{{ $editTypes->type_name == 'mansion' ? 'selected': '' }}>Mansion</option>
								<option value="other"{{ $editTypes->type_name == 'other' ? 'selected': '' }}>Other</option>
							</select>

							<div class="mt-3">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
						</div>
					</div>
				</form>
					</div>
				</div>
			</div>
</div>

@endsection