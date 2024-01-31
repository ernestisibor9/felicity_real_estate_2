@extends('frontpage.dashboard')


@section('main')
    <main id="main">
        <section class="mt-5">
            <div class="container mt-5">
              <div class="row">
                <h1 class="text-center">Finished Properties</h1>
                      @foreach ($property as $item)
                        <div class="col-md-4 col-lg-4 g-5" data-aos="zoom-in" data-aos-duration="2000">
                          <a href="">
                            <img src="{{asset($item->property_thumbnail)}}" class="img-fluid mb-2"/>
                          </a>
                          <h6>Property Name: {{$item->property_name}}</h6>
                          <h6>Property Category: Finished Property</h6>
                          <h6>Property Price: &#8358;{{$item->price}}</h6>
                          <button class="btn btn-primary">Buy</button>
                          <button class="btn btn-danger">Details</button>
                        </div>
                      @endforeach
              </div>
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection