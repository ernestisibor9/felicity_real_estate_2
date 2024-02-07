@extends('frontpage.dashboard')

<style>
    @media screen and (max-width: 540px) {
    .mob {
      margin-top: 50px;
    }
     .mob-politics{
      margin-top: -580px;
    } 
    .mob-business{
      margin-top: -580px;
    }
    .mob-sports{
      margin-top: -580px;
    }  
  }
  </style>

@section('main')
    <main id="main">
        <!-- ======= Real Estate Blog Section ======= -->
        <section class="section-news section-t8" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between mob">
                    <div class="title-box">
                    <h2 class="title-a">Blogs</h2>
                    </div>
                    <div class="title-link">
                    <a href="blog-grid.html">Real Estate Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a>
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
        <section class="section-news section-t8 mob-politics" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <h2 class="title-a"></h2>
                    </div>
                    <div class="title-link">
                    <a href="blog-grid.html">Politics Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a>
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
        <section class="section-news section-t8 mob-business" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <h2 class="title-a"></h2>
                    </div>
                    <div class="title-link">
                    <a href="blog-grid.html">Business Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a>
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
        <section class="section-news section-t8 mob-sports" id="blog">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <h2 class="title-a"></h2>
                    </div>
                    <div class="title-link">
                    <a href="blog-grid.html">Sports Blogs
                        <span class="bi bi-chevron-right"></span>
                    </a>
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