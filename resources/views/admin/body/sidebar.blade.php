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
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-home-smile"></i>
						</div>
						<div class="menu-title">Property Type</div>
					</a>
					<ul>
						<li> <a href="{{ route('add.type') }}"><i class='bx bx-radio-circle'></i>Add Property Type</a>
						</li>
						<li> <a href="{{ route('all.type') }}"><i class='bx bx-radio-circle'></i>All Property Type</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Property</div>
					</a>
					<ul>
						<li> <a href="{{ route('add.property') }}"><i class='bx bx-radio-circle'></i>Add Property </a>
						</li>
						<li> <a href="{{ route('all.property') }}"><i class='bx bx-radio-circle'></i>All Property </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-carousel"></i>
						</div>
						<div class="menu-title">Carousel</div>
					</a>
					<ul>
						<li> <a href="{{ route('add.carousel') }}"><i class='bx bx-radio-circle'></i>Add Carousel </a>
						</li>
						<li> <a href="{{ route('all.carousel') }}"><i class='bx bx-radio-circle'></i>All Carousel </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-happy-heart-eyes"></i>
						</div>
						<div class="menu-title">Testimonial</div>
					</a>
					<ul>
						<li> <a href="{{ route('add.testimonial') }}"><i class='bx bx-radio-circle'></i>Add Testimonial </a>
						</li>
						<li> <a href="{{ route('all.testimonial') }}"><i class='bx bx-radio-circle'></i>All Testimonial </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">Blog Category</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.blog.category') }}"><i class='bx bx-radio-circle'></i>All Blog Category </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-book'></i>
						</div>
						<div class="menu-title">Blog Post</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.post') }}"><i class='bx bx-radio-circle'></i>All Post </a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{ route('add.post') }}"><i class='bx bx-radio-circle'></i>Add Post </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ route('admin.blog.comment') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
						</div>
						<div class="menu-title">Blog Comment</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.message') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-message-detail"></i>
						</div>
						<div class="menu-title">Message</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.inspection') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-tachometer"></i>
						</div>
						<div class="menu-title">Inspection</div>
					</a>
				</li>
				{{-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Property Category</div>
					</a>
					<ul>
						<li> <a href="{{ route('add.property.category') }}"><i class='bx bx-radio-circle'></i>Add Property Category </a>
						</li>
						<li> <a href="{{ route('all.property.category') }}"><i class='bx bx-radio-circle'></i>All Property Category </a>
						</li>
					</ul>
				</li> --}}
				{{-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Application2</div>
					</a>
					<ul>
						<li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
						</li>
						<li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
						</li>
						<li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
						</li>
						<li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
						</li>
						<li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
						</li>
						<li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
						</li>
					</ul>
				</li> --}}
				<li class="menu-label">Admin Details</li>
				<li>
					<a href="{{ route('admin.profile') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Profile</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.change.password') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-key"></i>
						</div>
						<div class="menu-title">Change Password</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.users') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-user-plus"></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.logout') }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-log-out-circle"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
				{{-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">eCommerce</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
						</li>
						<li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New Products</a>
						</li>
						<li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
						</li>
					</ul>
				</li> --}}

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->