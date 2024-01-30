  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!-- <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a> -->
      <a class="navbar-brand text-brand" href="index.html">
        <!-- <img src="assets/img/logo.png" class="logo-el" alt=""> -->
        <div class="logo-el">
          <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="">
        </div>
      </a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="{{url('/')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="about.html">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="property-grid.html">Property</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="blog-grid.html">Blog</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Agents</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="property-single.html">Property Single</a>
              <a class="dropdown-item " href="blog-single.html">Blog Single</a>
              <a class="dropdown-item " href="agents-grid.html">Agents Grid</a>
              <a class="dropdown-item " href="agent-single.html">Agent Single</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="contact.html">Contact</a>
          </li>
        </ul>
      </div>

      {{-- @auth --}}
          
				<button type="button" class="btn btn-outline" data-bs-toggle="" data-bs-target="">
					<a href="{{ route('login') }}" class="text-white">Sign in</a>
				</button>

      {{-- @else --}}
    
      <button type="button" class="btn btn-singup navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="" data-bs-target="">
        <a href="{{ route('register') }}">Sign up</a>
      </button>
      <button type="button" class="btn btn-b-n navbar-toggle-box toggle-navbar navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>
      {{-- @endauth --}}

     </div>

    </div>
  </nav><!-- End Header/Navbar -->