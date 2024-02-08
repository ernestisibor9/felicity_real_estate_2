@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - All Users
@endsection

@php
		$users = App\Models\User::where('role', 'user')->latest()->get();
		// $admin = App\Models\User::where('role', 'admin')->latest()->get();
		$property = App\Models\Property::latest()->get();
		$allUsers = App\Models\User::latest()->get();
		// $subscribers = App\Models\Subscriber::latest()->get();
@endphp

<div class="page-wrapper">
			<div class="page-content">



				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">List of Users</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul>
							</div>
						</div>
					 </div>
                         <div class="card-body">
							
						 <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Photo</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $key => $user)
										<tr>
											<td>{{ $key + 1 }}</td>
											<td><img src="{{ (!empty($user->photo)) ? url('upload/user_images/'.$user->photo) : url('upload/no-image.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60"></td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->phone }}</td>
											<td>
												@if ( $user->status == '1')
															<span class="badge rounded-pill bg-success">approve</span>
													@else
															<span class="badge rounded-pill bg-danger">Inapprove</span>
													@endif
											</td>
											<td>
												{{-- <a href="{{ route('approve.user', $user->id) }}" title="approve" class="btn btn-success"><i class="fadeIn animated bx bx-book-alt"></i></a>
												<a href="" title="Inapprove" class="btn btn-primary"><i class="fadeIn animated bx bx-bell-off"></i></a> --}}
												{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleWarningModal">Change Status</button> --}}
												<a href="{{ route('change.user.status', $user->id) }}" class="btn btn-{{ $user->status ? 'dark': 'success'  }}">{{ $user->status ? 'Inapprove' : 'approve'  }} </a>
												<button href="{{ route('delete.user', $user->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
												
											</td>											
										</tr>
						</div>
									@endforeach
								</tbody>
							</table>

							
					</div>


			</div>
		</div>

@endsection