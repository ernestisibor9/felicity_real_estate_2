@extends('user.dashboard')

@section('user_main')

@php
	$id = Auth::user()->id;
	$userData = App\Models\User::find($id);

	// dd($userData);
	// exit();
@endphp

<div class="page-wrapper">
			<div class="page-content">
				<h1 class="mb-4">Welcome {{$userData->name}}</h1>
				@if ($userData->status === 0)
					<h5>Account Status: <span class="text-danger">Pending</span></h5>
					<h6>Admin will check and approved your account if matched our terms and conditions</h6>
				@else
				<h5>Account Status: <span class="text-success">Active</span></h5>
				@endif
			</div>
		</div>

@endsection