<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // AllBlog
    public function AllBlog(){
        $realEstate = BlogPost::where('post_tag', 'Real Estate')->get();
        $politics = BlogPost::where('post_tag', 'Politics')->get();
        $business = BlogPost::where('post_tag', 'Business')->get();
        $education = BlogPost::where('post_tag', 'Education')->get();
        $entertainment = BlogPost::where('post_tag', 'Entertainment')->get();
        $sports = BlogPost::where('post_tag', 'Sports')->get();
        return view('frontpage.blog.all_blog', compact('realEstate', 'politics', 'business', 'education', 'entertainment', 'sports'));
    }
}
