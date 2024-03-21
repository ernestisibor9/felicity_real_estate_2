@extends('frontpage.dashboard')

<style>
    @media screen and (max-width: 540px) {
    .mob {
      margin-top: 30px;
    }
     .mob-politics{
      margin-top: -550px;
    } 
    .mob-business{
      margin-top: -550px;
    }
    .mob-sports{
      margin-top: -550px;
    }  
  }
  </style>

  <style>
  .swiper-slide .img-fluid{
    max-width: 100%; /* Ensures the image does not exceed the container's width */
    max-height: 100%; /* Ensures the image does not exceed the container's height */
    width: auto; /* Allows the image to adjust its width based on the container */
    height: auto; /* Allows the image to adjust its height based on the container */
  } 

  .finish-cont{
    margin-bottom: -400px;
  }

</style>

@section('main')
    <main id="main">

        @section('title')
            Felicity Properties -All Blog
        @endsection

        <!-- ======= Real Estate Blog Section ======= -->
        <section class="section-news section-t8 finish-cont" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between mob">
                    <div class="title-box">
                    <h2 class="title-a">Real Estate</h2>
                    </div>
                    <div class="title-link">
                    {{-- <a href="blog-grid.html">Real Estate Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a> --}}
                    </div>
                </div>
                </div>
            </div>

            <div id="news-carousel" class="swiper">
                <div class="swiper-wrapper">
                @foreach ($realEstate as $item)
                <div class="carousel-item-c swiper-slide">
                    <div class="card-box-b card-shadow news-box">
                    <div class="img-box-b">
                        <img src="{{asset($item->post_image)}}" alt="" class="img-b img-fluid">
                    </div>
                    <div class="card-overlay">
                        <div class="card-header-b">
                        <div class="card-category-b">
                            <a href="{{url('blog/details/'.$item->post_slug)}}" class="category-b">{{$item->category->category_name}}</a>
                        </div>
                        <div class="card-title-b">
                            <h2 class="title-2">
                            <a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}
                                <br><small style="font-size: 0.8rem;">{{$item->category->category_name}}</small></a>
                            </h2>
                        </div>
                        <div class="card-date">
                            <span class="date-b">{{$item->created_at->format('M d Y')}}</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div><!-- End carousel item -->
                @endforeach

                </div>
            </div>

            <div class="news-carousel-pagination carousel-pagination"></div>
            </div>
        </section><!-- End Real Estate Section -->
        <!-- ======= Politics Blog Section ======= -->
        <section class="section-news section-t8 mob-politics finish-cont" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <div class="title-box">
                    <h2 class="title-a">Politics</h2>
                    </div>
                    </div>
                    <div class="title-link">
                    {{-- <a href="blog-grid.html">Politics Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a> --}}
                    </div>
                </div>
                </div>
            </div>

            <div id="news-carousel" class="swiper">
                <div class="swiper-wrapper">
                @foreach ($politics as $item)
                <div class="carousel-item-c swiper-slide">
                    <div class="card-box-b card-shadow news-box">
                    <div class="img-box-b">
                        <img src="{{asset($item->post_image)}}" alt="" class="img-b img-fluid">
                    </div>
                    <div class="card-overlay">
                        <div class="card-header-b">
                        <div class="card-category-b">
                            <a href="{{url('blog/details/'.$item->post_slug)}}" class="category-b">{{$item->category->category_name}}</a>
                        </div>
                        <div class="card-title-b">
                            <h2 class="title-2">
                            <a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}
                                <br><small style="font-size: 0.8rem;">{{$item->category->category_name}}</small></a>
                            </h2>
                        </div>
                        <div class="card-date">
                            <span class="date-b">{{$item->created_at->format('M d Y')}}</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div><!-- End carousel item -->
                @endforeach

                </div>
            </div>

            <div class="news-carousel-pagination carousel-pagination"></div>
            </div>
        </section><!-- End Politics Section -->
        <!-- ======= Business Blog Section ======= -->
        <section class="section-news section-t8 mob-business finish-cont" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <div class="title-box">
                    <h2 class="title-a">Business</h2>
                    </div>
                    </div>
                    <div class="title-link">
                    {{-- <a href="blog-grid.html">Business Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a> --}}
                    </div>
                </div>
                </div>
            </div>

            <div id="news-carousel" class="swiper">
                <div class="swiper-wrapper">
                @foreach ($business as $item)
                <div class="carousel-item-c swiper-slide">
                    <div class="card-box-b card-shadow news-box">
                    <div class="img-box-b">
                        <img src="{{asset($item->post_image)}}" alt="" class="img-b img-fluid">
                    </div>
                    <div class="card-overlay">
                        <div class="card-header-b">
                        <div class="card-category-b">
                            <a href="{{url('blog/details/'.$item->post_slug)}}" class="category-b">{{$item->category->category_name}}</a>
                        </div>
                        <div class="card-title-b">
                            <h2 class="title-2">
                            <a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}
                                <br><small style="font-size: 0.8rem;">{{$item->category->category_name}}</small></a>
                            </h2>
                        </div>
                        <div class="card-date">
                            <span class="date-b">{{$item->created_at->format('M d Y')}}</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div><!-- End carousel item -->
                @endforeach

                </div>
            </div>

            <div class="news-carousel-pagination carousel-pagination"></div>
            </div>
        </section><!-- End Business Section -->
        <!-- ======= Sports Blog Section ======= -->
        <section class="section-news section-t8 mob-sports finish-cont" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <div class="title-box">
                    <h2 class="title-a">Sports</h2>
                    </div>
                    </div>
                    <div class="title-link">
                    {{-- <a href="blog-grid.html">Sports Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a> --}}
                    </div>
                </div>
                </div>
            </div>

            <div id="news-carousel" class="swiper">
                <div class="swiper-wrapper">
                @foreach ($sports as $item)
                <div class="carousel-item-c swiper-slide">
                    <div class="card-box-b card-shadow news-box">
                    <div class="img-box-b">
                        <img src="{{asset($item->post_image)}}" alt="" class="img-b img-fluid">
                    </div>
                    <div class="card-overlay">
                        <div class="card-header-b">
                        <div class="card-category-b">
                            <a href="{{url('blog/details/'.$item->post_slug)}}" class="category-b">{{$item->category->category_name}}</a>
                        </div>
                        <div class="card-title-b">
                            <h2 class="title-2">
                            <a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}
                                <br><small style="font-size: 0.8rem;">{{$item->category->category_name}}</small></a>
                            </h2>
                        </div>
                        <div class="card-date">
                            <span class="date-b">{{$item->created_at->format('M d Y')}}</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div><!-- End carousel item -->
                @endforeach

                </div>
            </div>

            <div class="news-carousel-pagination carousel-pagination"></div>
            </div>
        </section><!-- End Politics Section -->
    </main>


@endsection