@extends('frontpage.dashboard')


@section('main')
        @section('title')
          Felicity Properties - Contact
        @endsection
    <main id="main">
        <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">Contact US</h1>
                <span class="color-text-a">We are here to attend to any of your needs concerning real estate properties.</span>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Contact
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single-->
  
      <!-- ======= Contact Single ======= -->
      <section class="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="contact-map box">
                <div id="map" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126779.76620094417!2d3.288391638174033!3d6.78595081311537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x103b9350b1689f9b%3A0x399608bec7acc54e!2s13%20Joseph%20St%2C%20Opebi%2C%20Ikeja%20101233%2C%20Lagos!3m2!1d6.5929493!2d3.3604791!5e0!3m2!1sen!2sng!4v1707220105694!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
            <div class="col-sm-12 section-t8">
              <div class="row">
                <div class="col-md-7">
                  <form action="{{route('store.contact')}}" method="post">
                    @csrf

                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <div class="form-group">
                          <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Your Name" required>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="subject" class="form-control form-control-lg form-control-a" placeholder="Subject" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-2">
                        <div class="form-group">
                          <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="Message" required></textarea>
                        </div>
                      </div>
  
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-5 section-md-t3">
                  <div class="icon-box section-b2">
                    <div class="icon-box-icon">
                      <span class="bi bi-envelope"></span>
                    </div>
                    <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                        <h4 class="icon-title">Say Hello</h4>
                      </div>
                      <div class="icon-box-content">
                        <p class="mb-1">Email.
                          <span class="color-a">info@felicitypropertiesltd.com</span>
                        </p>
                        <p class="mb-1">Phone.
                          <span class="color-a">07038950658</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="icon-box section-b2">
                    <div class="icon-box-icon">
                      <span class="bi bi-geo-alt"></span>
                    </div>
                    <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                        <h4 class="icon-title">Find us in</h4>
                      </div>
                      <div class="icon-box-content">
                        <p class="mb-1">
                            13, Joseph Street, Opebi, Ikeja
                          <br> Lagos, Nigeria.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="icon-box">
                    <div class="icon-box-icon">
                      <span class="bi bi-share"></span>
                    </div>
                    <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                        <h4 class="icon-title">Social networks</h4>
                      </div>
                      <div class="icon-box-content">
                        <div class="socials-footer">
                          <ul class="list-inline">
                            <li class="list-inline-item">
                              <a href="#" class="link-one">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                              </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://wa.me/07038950658" class="link-one">
                                  <i class="bi bi-whatsapp" aria-hidden="true"></i>
                                </a>
                              </li>
                            <li class="list-inline-item">
                              <a href="#" class="link-one">
                                <i class="bi bi-twitter" aria-hidden="true"></i>
                              </a>
                            </li>
                            <li class="list-inline-item">
                              <a href="#" class="link-one">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                              </a>
                            </li>
                            <li class="list-inline-item">
                              <a href="#" class="link-one">
                                <i class="bi bi-linkedin" aria-hidden="true"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Contact Single-->
    </main>

    <!-- Validate js -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                property_name: {
                    required : true,
                },
								property_status: {
                    required : true,
                }, 
								price: {
                    required : true,
                },
								property_category: {
                    required : true,
                },
								property_thumbnail:{
										required: true
								},
								ptype_id:{
									required: true
								}
                
            },
            messages :{
                property_name: {
                    required : 'Please Enter Property Name',
                }, 
                property_status: {
                    required : 'Please Select Property Status',
                },
								price: {
                    required : 'Please Select Price',
                },
								property_category: {
                    required : 'Please Select Property Category',
                },
								property_thumbnail:{
									required : 'Please Upload a Thumbnail Photo',
								},
								ptype_id:{
									required : 'Please Select a Property Type',
								}

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
	<!-- End Validate js -->

@endsection