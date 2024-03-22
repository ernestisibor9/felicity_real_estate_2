<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Carbon\Carbon;

class BlogController extends Controller
{
    // AllBlogCategory
    public function AllBlogCategory(){
        $category = BlogCategory::latest()->get();
        return view('backend.blog.blog_category', compact('category'));
    }
    // StoreBlogCategory
    public function StoreBlogCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:blog_categories|max:200',
        ]);

        // Insert into database
        BlogCategory::insert([
            'category_name'=>$request->category_name,
            'category_slug' => strtolower(str_replace(',','-',$request->category_name))
        ]);
        $notification = array(
                'message'=> 'Category Created Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    // EditBlogCategory
    public function EditBlogCategory($id){
        $editCategory = BlogCategory::findOrFail($id);
        return view('backend.blog.edit_blog_category', compact('editCategory'));
    }
    // UpdateBlogCategory
    public function UpdateBlogCategory(Request $request){
        $pid = $request->id;

        BlogCategory::findOrFail($pid)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(',','-',$request->category_name))
        ]);
        $notification = array(
            'message'=> 'Category Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    // DeleteBlogCategory
    public function DeleteBlogCategory($id){
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Category Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // AllPost
    public function AllPost(){
        $post = BlogPost::latest()->get();
        return view('backend.post.all_post', compact('post'));
    }
    // AddPost
    public function AddPost(){
        $blogcat = BlogCategory::latest()->get();
        return view('backend.post.add_post', compact('blogcat'));
    }
    // StorePost
    public function StorePost(Request $request){
        $request->validate([
            'post_image' => 'required|image|max:1024|mimes:jpg,jpeg,png,gif',
            'long_desc' => 'required'
        ]);

        // Without Imagick 700 x 800
        $image = $request->file('post_image');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/post/'), $filename);

        $save_url = 'upload/post/' . $filename;
        // // create new manager instance with desired driver
        // $manager = new ImageManager(new Driver());

        // $image = $request->file('post_image');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // // read image from file system
        // $img = $manager->read($image);
        // $img = $img->resize(700, 500);

        // // save modified image in new format 
        // $img->toJpeg(80)->save(base_path('public/upload/post/'.$name_gen));

        // $save_url = 'upload/post/'.$name_gen;

        BlogPost::insert([
            'blog_cat_id' => $request->blog_cat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(',','-',$request->post_title)),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'post_tag' => $request->post_tag,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=> 'Post Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.post')->with($notification);
    }
    // EditPost
    public function EditPost($id){
        $blogcat = BlogCategory::latest()->get();
        $editPost = BlogPost::findOrFail($id);
        return view('backend.post.edit_post', compact('editPost', 'blogcat'));
    }
    // UpdatePost
    public function UpdatePost(Request $request){
        $pid = $request->id;
        $postImg = $request->post_img;

        if($request->file('post_image')){
            // // create new manager instance with desired driver
            // $manager = new ImageManager(new Driver());

            // $image = $request->file('post_image');
            // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // // read image from file system
            // $img = $manager->read($image);
            // $img = $img->resize(700, 500);

            // // save modified image in new format 
            // $img->toJpeg(80)->save(base_path('public/upload/post/'.$name_gen));

            // $save_url = 'upload/post/'.$name_gen;
            unlink(public_path($postImg));

            $request->validate([
                'post_image' => 'required|image|max:1024',
            ]);
    
            // Without Imagick 
            $image = $request->file('post_image');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/post/'), $filename);
    
            $save_url = 'upload/post/' . $filename;

            BlogPost::findOrFail($pid)->update([
                'blog_cat_id' => $request->blog_cat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(',','-',$request->post_title)),
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'post_tag' => $request->post_tag,
                'post_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        else{
            BlogPost::findOrFail($pid)->update([
                'blog_cat_id' => $request->blog_cat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(',','-',$request->post_title)),
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'post_tag' => $request->post_tag,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message'=> 'Post Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.post')->with($notification);
    }
    // Delete Post
    public function DeletePost($id){
        $deleteId = BlogPost::findOrFail($id);
        unlink($deleteId->post_image);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Post Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // BlogDetails
    public function BlogDetails($slug){
        $blog = BlogPost::where('post_slug', $slug)->first();
        $tag = $blog->post_tag;
        $tagAll = explode(',',$tag);
        return view('frontpage.blog.blog_details', compact('blog', 'tagAll'));
    }
    // StoreComment
    public function StoreComment(Request $request){
        $pid = $request->post_id;

        // Insert into database
        Comment::insert([
            'name'=>$request->name,
            'email' => $request->email,
            'post_id' => $pid,
            'parent_id' => null,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=> 'Comment Inserted Successfully',
            'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);
    }
    // AdminBlogComment
    public function AdminBlogComment(){
        $comment = Comment::where('parent_id', null)->latest()->get();
        return view('backend.comment.all_comment', compact('comment'));
    }
    // AdminCommentReply
    public function AdminCommentReply($id){
        $comment = Comment::where('id', $id)->first();
        return view('backend.comment.reply_comment', compact('comment'));
    }
    // ReplyMessage
    public function ReplyMessage(Request $request){
        $id = $request->id;
        $pid = $request->post_id;
        $name = $request->name;
        $email = $request->email;
         // Insert into database
         Comment::insert([
            'name'=>$name,
            'email' => $email,
            'post_id' => $pid,
            'parent_id' => $id,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=> 'Reply Inserted Successfully',
            'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);
    }
}
