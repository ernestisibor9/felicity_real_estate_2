@extends('admin.admin_dashboard')


@section('admin')


<div class="page-wrapper">
    <div class="page-content">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ Str::substr($item->message, 0, 70) }}...</td>										
                        </tr>
        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    
@endsection