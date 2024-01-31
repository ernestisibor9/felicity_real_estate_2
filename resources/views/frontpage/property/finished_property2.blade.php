{{-- @extends('frontpage.dashboard')


@section('main')
    <main id="main">
        <section class="mt-5">
            <div class="container mt-5">
              <div class="row">
                <h1 class="text-center">Finished Properties</h1>
                      @foreach ($propertyCategory as $item)
                        <div class="col-md-4 col-lg-4 g-5">
                          <img src="{{asset($item->photo)}}" class="img-fluid"/>
                          <h6>{{$item->category_name}}</h6>
                          <h6>Price: {{$item->price}}</h6>
                          <button class="btn btn-primary">Buy</button>
                          <button class="btn btn-primary">Details</button>
                        </div>
                      @endforeach
              </div>
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection --}}