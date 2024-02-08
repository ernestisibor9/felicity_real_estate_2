@extends('admin.admin_dashboard')


@section('admin')

@section('title')
	Felicity Properties - All Category
@endsection


<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ asset($item->photo) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->property->city }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <a href="{{ route('edit.category', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.category', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
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