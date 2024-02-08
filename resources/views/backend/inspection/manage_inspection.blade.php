@extends('admin.admin_dashboard')


@section('admin')

@section('title')
	Felicity Properties - Manage Inspection 
@endsection


<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Property Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->property_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->inspection_date }}</td>
                            <td>{{ $item->inspection_time }}</td>
                            <td>{{ $item->message }}</td>
                            <td>
                                @if ( $item->status == '1')
                                            <span class="badge rounded-pill bg-success">Approved</span>
                                    @else
                                            <span class="badge rounded-pill bg-danger">Not Approve</span>
                                    @endif
                            </td>
                            <td>
                                {{-- <a href="{{ route('active.item', $item->id) }}" title="Active" class="btn btn-success"><i class="fadeIn animated bx bx-book-alt"></i></a>
                                <a href="" title="Inactive" class="btn btn-primary"><i class="fadeIn animated bx bx-bell-off"></i></a> --}}
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleWarningModal">Change Status</button> --}}
                                <a href="{{ route('inspect.property.status', $item->id) }}" class="btn btn-{{ $item->status ? 'dark': 'success'  }}">{{ $item->status ? 'InActive' : 'Active'  }} </a>
                                {{-- <a href="{{ route('edit.property', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                <button href="{{ route('delete.property', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button> --}}
                                
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