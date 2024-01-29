@extends('admin.admin_dashboard')


@section('admin')


<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ asset($item->property_thumbnail) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                            <td>{{ $item->property_name }}</td>
                            <td>{{ $item->type->type_name }}</td>
                            <td>{{ $item->property_status }}</td>
                            <td>{{ $item->city }}</td>
                            <td>
                                @if ( $item->status == '1')
                                            <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                            <span class="badge rounded-pill bg-danger">InActive</span>
                                    @endif
                            </td>
                            <td>
                                {{-- <a href="{{ route('active.item', $item->id) }}" title="Active" class="btn btn-success"><i class="fadeIn animated bx bx-book-alt"></i></a>
                                <a href="" title="Inactive" class="btn btn-primary"><i class="fadeIn animated bx bx-bell-off"></i></a> --}}
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleWarningModal">Change Status</button> --}}
                                <a href="{{ route('change.property.status', $item->id) }}" class="btn btn-{{ $item->status ? 'dark': 'success'  }}">{{ $item->status ? 'InActive' : 'Active'  }} </a>
                                <button href="{{ route('delete.property', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button>
                                
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