<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;

use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribeMail;

class SubscriberController extends Controller
{
    // AddSubscriber
    public function StoreSubscriber(Request $request){
        // Insert into database
        Subscriber::insert([
            'email'=>$request->email,
            'status' => 1
        ]);
        $data = [
            'Subject' => 'Thanks for subscribing.',
            'Message' => 'You can download the ebook attached to this mail. The ebook will guide you through real estate properties in Nigeria '
        ];
        Mail::to(($request->email))->send(new SubscribeMail($data));
        $notification = array(
                'message'=> 'Thanks for subscribing. A free ebook has been sent to your email',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
