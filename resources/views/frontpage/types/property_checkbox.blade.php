@extends('frontpage.dashboard')


@section('main')
      @section('title')
        Felicity Properties - Select Property Types
      @endsection
    <main id="main">
        <section class="mt-5">
            <div class="container mt-5">
              <div class="row">
                <h2 class="text-center" style="margin-top: 80px;">Select Property Types</h2>

                @if (!empty($_GET['type_name']))
                   @php
                       $filterTypeName = explode(',', $_GET['type_name'])
                   @endphp 
                @endif

                <form action={{route('shop.filter')}} method='post'>
                  @csrf
                    @foreach ($types as $item)
                        <input type="checkbox" id="myCheckbox{{$item->id}}" name="type_name[]" value = "{{$item->id}}" @if(!empty($filterTypeName) && in_array($item->id,$filterTypeName))
                        checked @endif onchange="this.form.submit()">
                        <label for="myCheckbox{{$item->id}}">{{$item->type_name}}</label>
                    @endforeach
                </form>
              </div>
            </div>
          </section><!-- End Intro Single-->
    </main>


@endsection