<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

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
}
