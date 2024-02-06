<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // ReadServices
    public function ReadServices(){
        return view("frontpage.services.our_services");
    }
}
