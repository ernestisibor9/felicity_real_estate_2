<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
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
        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // read image from file system
        $img = $manager->read($image);
        $img = $img->resize(500, 500);

        // save modified image in new format 
        $img->toJpeg(80)->save(base_path('public/upload/post/'.$name_gen));

        $save_url = 'upload/post/'.$name_gen;

        BlogPost::insert([
            'blog_cat_id' => $request->blog_cat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(',', '-', $request->post_title)),
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

        if($request->file('post_image')){
            // create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // read image from file system
            $img = $manager->read($image);
            $img = $img->resize(500, 500);

            // save modified image in new format 
            $img->toJpeg(80)->save(base_path('public/upload/post/'.$name_gen));

            $save_url = 'upload/post/'.$name_gen;

            BlogPost::findOrFail($pid)->update([
                'blog_cat_id' => $request->blog_cat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(',', '-', $request->post_title)),
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
                'post_slug' => strtolower(str_replace(',', '-', $request->post_title)),
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
}
