@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Add Property Type
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
                        <div class="mt-2 mb-3">
                            <a href= "{{route('export')}}" class="btn btn-danger">Download CSV</a>
                        </div>
						<h6 class="mb-0 text-uppercase">Import Property</h6>
				<hr>
				<form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                        <label>CSV File Import</label>
							<input type='file' class= 'form-control mb-3' name= 'import_file' />
        
							<div class="mt-3">
								<button type="submit" class="btn btn-primary">Upload CSV</button>
							</div>
						</div>
					</div>
				</form>
					</div>
				</div>
			</div>
</div>

@endsection