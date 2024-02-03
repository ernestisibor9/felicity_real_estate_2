@extends('admin.admin_dashboard')

@section('admin')


<div class="page-wrapper">
			<div class="page-content">
				<div class="mt-2 mb-4">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</button>
				</div>
				<div class="card">
					<div class="card-body">
                        <h4>All Blog Category</h4>
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Category Name</th>
                                        <th>Category Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($category as $key => $cat)
										<tr>
											<td>{{ $key + 1 }}</td>
											<td>{{ $cat->category_name }}</td>
                                            <td>{{ $cat->category_slug }}</td>
											<td>
												<a href="{{ route('cat.edit', $cat->id) }}" title="Edit" class="btn btn-primary" >Edit</a>	
												<a href="{{ route('cat.delete', $cat->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</a>			
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
														<h5 class="modal-title" id="exampleModalLabel">Add Blog Category</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="{{ route('store.blog.category') }}" method="post">
					@csrf

					<label for="input8" class="form-label">Blog Category</label>
					<input type="text" class="form-control" id="input8" name="category_name" placeholder="Category Name">
										</div>
										<div class="modal-footer">
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