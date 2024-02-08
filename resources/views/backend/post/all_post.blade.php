@extends('admin.admin_dashboard')


@section('admin')

@section('title')
	Felicity Properties - All Post
@endsection

<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Post Title</th>
                        <th>Category</th>
                        <th>Post Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->post_title }}</td>
                            <td>{{ $item->category->category_name }}</td>
                            <td><img src="{{ asset($item->post_image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                           
                            <td>
                                <a href="{{ route('edit.post', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.post', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
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