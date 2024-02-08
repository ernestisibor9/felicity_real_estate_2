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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->property->property_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->inspection_date }}</td>
                            <td>{{ $item->inspection_time }}</td>
                            <td>{{ $item->message }}</td>											
                        </tr>
        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    
@endsection