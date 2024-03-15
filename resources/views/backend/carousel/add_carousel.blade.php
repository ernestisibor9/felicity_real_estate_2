@extends('admin.admin_dashboard')

@section('admin')

@section('title')
    Felicity Properties - Add Carousel
@endsection

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h6 class="mb-0 text-uppercase">Add Slider</h6>
                <hr>
                <form action="{{ route('store.carousel') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label">Property Name <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="input8" name="property_name" required
                                    placeholder="Property Name">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Price</label>
                                <select id="input7" class="form-select" name="price">
                                    <option selected="" disabled>Select Price Range</option>
                                    <option value="10000000">&#8358;10m</option>
                                    <option value="20000000">&#8358;20m</option>
                                    <option value="30000000">&#8358;30m</option>
                                    <option value="40000000">&#8358;40m</option>
                                    <option value="50000000">&#8358;50m</option>
                                    <option value="60000000">&#8358;60m</option>
                                    <option value="70000000">&#8358;70m</option>
                                    <option value="80000000">&#8358;80m</option>
                                    <option value="90000000">&#8358;90m</option>
                                    <option value="100000000">&#8358;100m</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="input8" class="form-label">City</label>
                                <input type="text" class="form-control" id="input8" name="city"
                                    placeholder="City" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input2" class="form-label">Property Slider Photo <span
                                        style="color: red;">*</span></label>
                                <input type="file" required name="photo_slide"
                                    class="form-control @error('photo_slide')is-invalid @enderror" id="input1"
                                    onChange="mainThamUrl(this)">
                                <div class="mt-2">
                                    @error('photo_slide')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <img src="" id="mainThmb">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
