@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Unfinished Property
      @endsection
    <main id="main">
        <section class="mt-5">
            <div class="container mt-5">
              <div class="row">
                <h1 class="text-center">Unfinished Properties</h1>
                      @foreach ($property as $item)
                        <div class="col-md-4 col-lg-4 g-5" data-aos="zoom-in" data-aos-duration="2000">
                          <a href="{{route('finish.properties.details', $item->id)}}">
                            <img src="{{asset($item->property_thumbnail)}}" class="img-fluid mb-2"/>
                          </a>
                          <h6>Property Name: {{$item->property_name}}</h6>
                          <h6>Location: {{$item->citys->city}}</h6>
                          <h6>Property Price: &#8358;{{number_format($item->price)}}</h6>
                          <a href="{{route('buy.unfinished.property', $item->id)}}" class="btn btn-primary">Buy</a>
                          <a href="{{route('unfinish.properties.details', $item->id)}}" class="btn btn-danger">Details</a>
                        </div>
                      @endforeach 
              </div>
            </div>
          </section><!-- End Intro Single-->
          <div class='container mt-5'>
            <div>
              {!!$property->links()!!}
            </div>
          </div>
    </main>


@endsection