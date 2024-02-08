@extends('admin.admin_dashboard')

@section('admin')

@section('title')
	Felicity Properties - Reply Comment
@endsection

<div class="page-wrapper">
			<div class="page-content">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h6 class="mb-0 text-uppercase">Reply Comment</h6>
				<hr>
				<form action="{{ route('reply.message') }}" method="post" enctype="multipart/form-data">
					@csrf
                    <input type="hidden" name="id" value="{{$comment->id}}">
                    <input type="hidden" name="post_id" value="{{$comment->post_id}}">
                    <input type="hidden" name="name" value="{{$comment->name}}">
                    <input type="hidden" name="email" value="{{$comment->email}}">

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12">
                                <label for="input8" class="form-label"><strong>User Name:</strong> </label> <br> 
                                {{$comment->name}}
                                <hr>
                                {{-- <input type="text" class="form-control" id="input8" name="name" value="{{$comment->name}}"> --}}
                            </div>
                            <div class="col-md-12">
                                <label for="input8" class="form-label"><strong>Post title:</strong></label> <br>
                                {{$comment->post->post_title}}
                                <hr>
                                {{-- <input type="text" class="form-control" id="input8" name="post_title" value="{{$comment->post->post_title}}"> --}}
                            </div>
                            <div class="col-md-12">
                                <label for="input8" class="form-label"><strong>Subject:</strong></label> <br>
                                {{$comment->subject}}
                                <hr>
                                {{-- <input type="text" class="form-control" id="input8" name="subject" value="{{$comment->subject}}"> --}}
                            </div>
                            <div class="col-md-12">
                                <label for=""><strong>Message: </strong></label> <br>
                                {{$comment->message}}
                                <hr>
                                {{-- <textarea class="form-control"  id="mytextarea" rows="3" name="long_desc">{{$comment->message}}</textarea> --}}
                            </div>
                            <h5 class="text-center">ADMIN REPLY</h5>
                            <div class="mt-3">
                                <div class="col-md-12">
                                    <label for="input8" class="form-label"><strong>Subject:</strong></label>
                                    <input type="text" class="form-control" id="input8" name="subject" >
                                </div>
                                <div class="col-md-12">
                                    <label for=""><strong>Message: </strong></label>
                                    <textarea class="form-control"  id="mytextarea" rows="3" name="message"></textarea>
                                </div>
                            </div>

							<div class="mt-3">
								<button type="submit" class="btn btn-primary">Reply Comment</button>
							</div>
						</div>
					</div>
				</form>
					</div>
				</div>
			</div>
</div>


<script type="text/javascript">
    function mainThamUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    } 
 </script>


@endsection