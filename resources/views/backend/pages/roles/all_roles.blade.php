@extends('admin.admin_dashboard')


@section('admin')

@section('title')
	Felicity Properties - Roles
@endsection

<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Roles Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('edit.roles', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.roles', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
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