@extends('frontpage.dashboard')


@section('main')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{$blog->post_title}}</h1>
              <span class="color-text-a">{{$blog->category->category_name}}</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{asset('/')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{$blog->category->category_name}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Blog Single ======= -->
    <section class="news-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="news-img-box" style="text-align: center;">
              <img src="{{asset($blog->post_image)}}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col-md-12 offset-md-1 col-lg-8 offset-lg-2">
            <div class="post-information">
              <ul class="list-inline text-center color-a">
                <li class="list-inline-item mr-2">
                  <strong>Author: </strong>
                  <span class="color-text-a">{{$blog->user->name}}</span>
                </li>
                <li class="list-inline-item mr-2">
                  <strong>Category: </strong>
                  <span class="color-text-a">{{$blog->category->category_name}}</span>
                </li>
                <li class="list-inline-item">
                  <strong>Date: </strong>
                  <span class="color-text-a">{{$blog->created_at->format('M d Y')}}</span>
                </li>
              </ul>
            </div>
            <div>
                <span>Tags: </span>
                @foreach ($tagAll as $tag)
                <a href="" class="btn btn-success">{{ucwords($tag)}}</a>
                @endforeach
            </div>
            <div class="post-content color-text-a">
              <p class="post-intro">
                {{$blog->short_desc}}
              </p>
              <p>
                {!!$blog->long_desc!!}
              </p>
              {{-- <p>
                Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac
                lectus. Curabitur
                non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Curabitur non
                nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada.
                Quisque velit nisi.
              </p> --}}
              {{-- <blockquote class="blockquote">
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">
                  <strong>Albert Vargas</strong>
                  <cite title="Source Title">Author</cite>
                </footer>
              </blockquote> --}}
              <p>
                Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit
                tortor eget felis
                porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
              </p>
            </div>
                  @php
                    $slug = $blog->post_slug;
                    $tag = $blog->post_tag;
                    // $tag2 = explode(',',$tag);
                    // $tagAll = implode(',',$tag2);
                    $relatedPosts = App\Models\BlogPost::where('post_slug', '<>', $slug)->where('post_tag', 'like', '%' .$tag. '%')->limit(3)->get();
                    $relatedCount = $relatedPosts->count();
                  @endphp
            <h4 class="title-d mt-4">Related Articles {{$relatedCount}}</h4>
            <hr class="mb-4">
            <!-- Related Post  -->
              <div class="row">

                  @foreach ($relatedPosts as $relatedPost)
                  <div class="col-md-4">
                    <a href="{{url('blog/details/'.$relatedPost->post_slug)}}">
                      <img src="{{asset($relatedPost->post_image)}}" alt="" width="180px" height="140px" style="margin-right: 50px;">
                    <small style="font-size: 0.9rem;">{{$relatedPost->post_title}}</small> <br>
                    <small style="font-size: 0.8rem;">{{$relatedPost->created_at->format('M d Y')}}</small>
                    </a>
                  </div>
                  @endforeach
                {{-- <div class="col-md-4">
                  <h1>Hello</h1>
                </div> --}}
              </div>
            <!--  --->
            <div class="post-footer">
              <div class="post-share">
                <span>Share: </span>
                <ul class="list-inline socials">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="bi bi-linkedin" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          @php
              $comment = App\Models\Comment::where('post_id', $blog->id)->where('parent_id', null)->
              limit(5)->get();
          @endphp

          <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="title-box-d">
              <h3 class="title-d">Comments ({{count($comment)}})</h3>
            </div>
            <div class="box-comments">
              <ul class="list-comments">
                @foreach ($comment as $item)
                <li>
                  <div class="comment-avatar">
                    <img src="{{asset('frontend/assets/img/avatar.png')}}" alt="">
                  </div>
                  <div class="comment-details">
                    <h4 class="comment-author">{{$item->name}}</h4>
                    <span>{{$item->created_at->format('M d Y')}}</span>
                    <p class="comment-description">
                      {{$item->message}}
                    </p>
                    <a href="3">Reply</a>
                  </div>
                </li>
                @php
                    $reply = App\Models\Comment::where('parent_id', $item->id)->get();
                @endphp
                @foreach ($reply as $rep)
                <li class="comment-children">
                  <div class="comment-avatar">
                    <img src="{{asset('frontend/assets/img/logo.jpg')}}" alt="">
                  </div>
                  <div class="comment-details">
                    <h4 class="comment-author">Admin</h4>
                    <span>{{$rep->created_at->format('M d Y')}}</span>
                    <p class="comment-description">
                      {!! $rep->message !!}
                    </p>
                    <a href="3">Reply</a>
                  </div>
                </li>
                @endforeach
                
                @endforeach
                
                {{-- <li>
                  <div class="comment-avatar">
                    <img src="assets/img/author-2.jpg" alt="">
                  </div>
                  <div class="comment-details">
                    <h4 class="comment-author">Emma Stone</h4>
                    <span>18 Sep 2017</span>
                    <p class="comment-description">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                      ipsam temporibus maiores
                      quae natus libero optio.
                    </p>
                    <a href="3">Reply</a>
                  </div>
                </li> --}}
              </ul>
            </div>
            <div class="form-comments">
              <div class="title-box-d">
                <h3 class="title-d"> Leave a Reply</h3>
              </div>
              <form class="form-a" action="{{route('store.comment')}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{$blog->id}}">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputName">Enter name</label>
                      <input type="text" name="name" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputEmail1">Enter email</label>
                      <input type="email" name="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label for="inputUrl">Subject</label>
                      <input type="text" name="subject" class="form-control form-control-lg form-control-a" id="inputUrl" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label for="textMessage">Enter message</label>
                      <textarea id="textMessage" name="message" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-a">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Blog Single-->

  </main><!-- End #main -->
@endsection