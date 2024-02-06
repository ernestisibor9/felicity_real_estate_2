<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // ContactPage
    public function ContactPage(){
        return view("frontpage.contact.contact_page");
    }
}
