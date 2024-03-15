@extends('admin.admin_dashboard')


@section('admin')

@section('title')
	Felicity Properties - Permissions
@endsection

<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Permission Name</th>
                        <th>Group Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->group_name }}</td>
                            <td>
                                <a href="{{ route('edit.permission', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.permission', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
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