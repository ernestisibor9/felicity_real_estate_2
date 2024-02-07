<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    // OurPartners
    public function OurPartners(){
        return view("frontpage.footer.our_partners");
    }
    // FAQ
    public function FAQ(){
        return view("frontpage.footer.faq");
    }
    // ShowTestimonial
    public function ShowTestimonial(){
        return view("frontpage.footer.testimonial");
    }
}
