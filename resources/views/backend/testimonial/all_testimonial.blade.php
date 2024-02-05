@extends('admin.admin_dashboard')


@section('admin')


<div class="page-wrapper">
    <div class="page-content">
        <h3>All Testimonial</h3>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonial as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset($item->photo) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                            <td>{{ Str::substr($item->message, 0, 70) }}...</td>
                           
                            <td>
                                <a href="{{ route('edit.testimonial', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.testimonial', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
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