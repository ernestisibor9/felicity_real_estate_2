@extends('admin.admin_dashboard')


@section('admin')


<div class="page-wrapper">
    <div class="page-content">
        <h4>All Blog Comment</h4>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>User Name</th>
                        {{-- <th>Post Title</th> --}}
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->name}}</td>
                            {{-- <td>{{ $item->post->post_title }}</td> --}}
                            <td>{{$item->subject}}</td>
                           
                            <td>
                                <a href="{{ route('admin.comment.reply', $item->id) }}" title="Edit" class="btn btn-warning">Reply</a>
                                
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