@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - All Location
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="mt-2 mb-4">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Location</button>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S/N</th>
										<th>City</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($cities as $key => $city)
										<tr>
											<td>{{ $key + 1 }}</td>
											<td>{{ $city->city }}</td>
											<td>
												<a href="{{ route('city.edit', $city->id) }}" title="Edit" class="btn btn-primary" >Edit</a>	
												<a href="{{ route('city.delete', $city->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</a>			
											</td>											
										</tr>
							</div>
									@endforeach
								</tbody>
							</table>

							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="{{ route('store.location') }}" method="post">
					@csrf

							 <input type='text' class= 'form-control mb-3' name= 'city' placeholder='E.g Lekki' required/>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Add</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					</div>
				</div>
			</div>
</div>

@endsection