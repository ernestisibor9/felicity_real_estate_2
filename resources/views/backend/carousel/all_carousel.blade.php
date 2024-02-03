@extends('admin.admin_dashboard')


@section('admin')


<div class="page-wrapper">
    <div class="page-content">
        <h3>Edit Carousel</h3>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Property Name</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carousel as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->property_name }}</td>
                            <td><img src="{{ asset($item->photo_slide) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->city }}</td>
                           
                            <td>
                                <a href="{{ route('edit.carousel', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.carousel', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
                            </td>											
                        </tr>
        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    
@endsection