@extends('admin.admin_dashboard')

@section('admin')

@section('title')
    Felicity Properties - Edit Carousel
@endsection

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h6 class="mb-0 text-uppercase">Edit Carousel</h6>
                <hr>
                <form action="{{ route('update.carousel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editCarousel->id }}">
                    <input type="hidden" name="photo_caro" value="{{ $editCarousel->photo_slide }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Property Name</label>
                                <input type="text" class="form-control" value="{{ $editCarousel->property_name }}"
                                    id="input8" name="property_name" placeholder="Property Name">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Price</label>
                                <select id="input7" class="form-select" name="price">
                                    <option selected="" disabled>Select Price Range</option>
                                    @foreach ($carousel as $item)
                                        <option value="{{ $item->price }}"
                                            {{ $item->price === $editCarousel->price ? 'selected' : '' }}>
                                            &#8358; {{ $item->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="input8" class="form-label">City</label>
                                <input type="text" class="form-control" value="{{ $editCarousel->city }}"
                                    id="input8" name="city" placeholder="City">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Property Slider Photo</label>
                                <input type="file" name="photo_slide" id="image"
                                    class="form-control @error('photo_slide')is-invalid @enderror">
                                <div class="mt-2">
                                    @error('photo_slide')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <img src="{{ asset($editCarousel->photo_slide) }}" id="showImage" alt=""
                                        width="90px" height="90px">
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection
