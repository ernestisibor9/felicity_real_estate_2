<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // ContactPage
    public function ContactPage(){
        return view("frontpage.contact.contact_page");
    }
    
    // Store Contact
    public function StoreContact(Request $request){

        // $request->validate([
        //     'type_name' => 'required|unique:property_types|max:200',
        // ]);

        // Insert into database
        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
                'message'=> 'Message Successfully Sent',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
