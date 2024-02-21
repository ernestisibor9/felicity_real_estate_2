@extends('frontpage.dashboard')


@section('main')

  @section('title')
    Felicity Properties - Book Inspection
  @endsection

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<main id="main">
             <!-- =======Intro Single ======= -->
    <!-- End Intro Single-->

      <section class="section-services section-t8">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap d-flex justify-content-between">
                <div class="title-box">
                  <h2 class="title-a">FILTER BY PRICE</h2>
                </div>
              </div>
              {{-- <h5 class="text-center text-dark">Please fill the form below </h5> --}}
            </div>
          </div>
          <form action="{{route('store.filter')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="price-range-block">

	<div class="sliderText">jQuery UI Price Range Slider</div>

	<div id="slider-range" class="price-filter-range" name="rangeInput"></div>
    
	<div style="margin:30px auto">
	  <input type="number"  id="min_price" class="price-range-field" name = 'min_price'/>
	  <input type="number"  id="max_price" class="price-range-field" name = 'max_price' />
	</div>

	<button type = 'submit' class='btn btn-success'>Filter</button>

	<div id="searchResults" class="search-results-block"></div>

</div>
          </form>
        </div>
      </section> 
        </main>

        <script>
	// $(document).ready(function(){
	// 	if($('#slider-range').length > 0){
	// 	   const max_price = parseInt($('#slider-range').data('max'));
	// 	   const min_price = parseInt($('#slider-range').data('min'));  
	// 	   let price_range = min_price+"-"+max_price
	// 	   let price = price_range.split('-');

    //        $("#slider-range").slider({
    //         range: true,
    //         min: min_price,
    //         max: max_price,
    //         values: price,

    //         slide: function (event, ui) {

    //             $("#amount").val('$'+ui.values[0]+"-"+'$'+ui.values[1]);
    //             $("#price_range").val(ui.values[0]+"-"+ui.values[1]);
    //         }
    //         });
	// 	}
	// })


</script>
@endsection