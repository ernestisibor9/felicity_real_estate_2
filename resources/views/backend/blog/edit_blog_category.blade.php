@extends('admin.admin_dashboard')

@section('admin')

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Edit Blog Category</h6>
				<hr>
				<form action="{{ route('update.blog.category') }}" method="post">
					@csrf
					<input type="hidden" name="id" id="id" value="{{ $editCategory->id }}">
					<div class="card">
						<div class="card-body">
							
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Blog Category</label>
                                <input type="text" class="form-control" id="input8" name="category_name" placeholder="Category Name" value="{{ $editCategory->category_name }}">
                            </div>

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