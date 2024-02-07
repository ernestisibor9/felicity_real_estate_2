@extends('frontpage.dashboard')


@section('main')
    <main id="main">
        <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single"></h1>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    About
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single-->

      <!-- ======= About Section ======= -->
    <section class="section-about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 position-relative">
              <div class="about-img-box">
                <img src="assets/img/slide-about-1.jpg" alt="" class="img-fluid">
              </div>
              <div class="sinse-box">
                <h3 class="sinse-title">Welcome to
                  <span></span>
                  <br> Felicity Properties Limited
                </h3>
                <p></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                {{-- <div class="col-md-6 col-lg-5">
                  <img src="{{asset('frontend/assets/img/about-2.jpg')}}" alt="" class="img-fluid">
                </div> --}}
                <div class="col-lg-2  d-none d-lg-block position-relative">
                  <div class="title-vertical d-flex justify-content-start">
                    <span></span>
                  </div>
                </div>
                <div class="col-md-12" style="text-align: justify">
                  <div class="title-box-d">
                    <h3 class="title-d">Felicity
                      <span class="color-d">Properties</span> Limited
                      <br> 
                    </h3>
                  </div>
                  <p class="color-text-a">
                    Welcome to Felicity Properties Limited, your trusted partner in the dynamic world of real estate in Lagos, Nigeria. Renowned for our commitment to excellence in property transactions, Felicity Properties Limited specializes in providing top-notch services for property sales, purchases, rentals, and long-term leases. Our comprehensive suite of services caters to the diverse needs of both local and international clients through our advanced online property platform.
                  </p>
                  <p class="color-text-a">
                    Distinguishing ourselves with a unique feature, Felicity Properties offers a diverse range of commercial and residential houses for rent, lease, or outright purchase in Nigeria. Our standout offering includes flexible payment plans, spread over 12 to 60 months, tailored to the specific location of the property.
                  </p>
                  <p class="color-text-a">
                    Serving as an extensive archive of available houses in Nigeria, Felicity Properties facilitates installment options for select properties in prominent locations such as Lekki, Ajah, Ibadan, Akure, Abuja, Mowe, and Ikorodu. These locations showcase houses with flexible monthly, quarterly, or milestone payment spread choices.
                  </p>
                  <p class="color-text-a">
                    Guided by our seasoned consultants, we conduct a thorough assessment of your preferences, location, and budget to identify the best fit from our installment house listings in Lagos, Ogun, Ibadan, Akure, and Abuja. Our goal is not only to ensure affordability but also to transparently communicate the terms and conditions associated with these installment houses, covering payment durations, delivery, possession, and key features.
                  </p>
                  <p class="color-text-a">
                    With over three years of successfully meeting the housing needs of Nigerians at home and abroad, Felicity Properties exudes professionalism and expertise. Investors in Nigeria's real estate market can attest to our capabilities by consulting with our knowledgeable team, where we provide valuable advice and guidance to overcome challenges and confusion in finding the ideal home for purchase or investment in Nigeria.
                  </p>
                  <p class="color-text-a">
                    Beyond installment houses, commercial, and rental properties, Felicity Properties boasts firsthand experience in lucrative property deals in prime locations such as Lekki Phase 1, Victoria Island, Ikoyi, Lagos Mainland, Ikate, and Abuja. We cater to various investment preferences, including short-term rentals, leaseholds, off-plan developments, and landbanking. These opportunities offer potential cash-outs in as little as 8 to 18 months, accommodating a range of capital levels.
                  </p>
                  <p class="color-text-a">
                    Irrespective of your capital, the property market in Lagos and Abuja offers diverse investment schemes. From budget-friendly leasehold apartments in Yaba, Gbagada, Somolu, to profitable buy-and-resell options in the Lekki, Ikate, Ajah axis, with potential profits ranging from N3 million to N8 million within six months, the possibilities are vast. Explore the abundant opportunities within the real estate market and maximize your investment potential with Felicity Properties.
                  </p>
                  <div class="title-box-d">
                    <h3 class="title-d">About
                      <span class="color-d"></span> Us
                      <br> 
                    </h3>
                  </div>
                  <p class="color-text-a">
                    Felicity Properties Limited stands as a renowned real estate firm headquartered in Lagos, Nigeria, specializing in top-notch services for property sales, purchases, rentals, and long-term leases. With a profound understanding of the ever-evolving real estate landscape, we serve as the bridge connecting Nigerians at home or abroad and investors seeking lucrative opportunities in the Nigerian real estate market.
                  </p>
                  <div class="title-box-d">
                    <h3 class="title-d">Why
                      <span class="color-d">Choose</span> Felicity Properties Limited
                      <br> 
                    </h3>
                  </div>
                  <p class="color-text-a">
                    - **Expertise:** Backed by a team of seasoned professionals, we bring   years of expertise to every real estate transaction.
                    - **Integrity:** We uphold the highest standards of integrity, transparency, and professionalism in all our dealings.
                    - **Client-Centric Approach:** Your satisfaction is our priority. We tailor our services to meet your specific needs, ensuring a positive and rewarding experience.

                    At Felicity Properties Limited, we go beyond property transactions; we build lasting relationships. Whether you are a homeowner, a tenant, an investor, or a global Nigerian seeking real estate opportunities, trust Felicity Properties Limited to be your guide in the thriving Lagos real estate market. Welcome to a world of endless possibilities with Felicity Properties Limited.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

@endsection