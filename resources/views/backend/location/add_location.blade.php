@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Location
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Add Location</h6>
				<hr>
				<form action="{{ route('store.location') }}" method="post">
					@csrf

					<div class="card">
						<div class="card-body">
                            <input type='text' class= 'form-control mb-3  @error('city')
                          is-invalid
                          @enderror' name= 'city' placeholder='E.g Lekki' required/>
							<div>
								@error('city')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
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

@endsection