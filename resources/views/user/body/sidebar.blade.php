@php
	$id = Auth::user()->id;
	$user = App\Models\User::where('id', $id)->where('role', 'user')->where('status', '1')->first();
@endphp

<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('frontend/assets/img/logorem.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Felicity</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="menu-label">My Profile</li>
				@if ($user)
				<li>
					<a href="{{route('add.user.property')}}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Add Property</div>
					</a>
				</li>
				@endif
				<li>
					<a href="{{ route('user.profile') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Profile</div>
					</a>
				</li>
				<li>
					<a href="{{ route('user.change.password') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-key"></i>
						</div>
						<div class="menu-title">Change Password</div>
					</a>
				</li>
				<li>
					<a href="{{ route('user.change.password') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-log-out-circle"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->