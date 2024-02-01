<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookInspection;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingInspectionMail;

class BookInspectionController extends Controller
{
    // BookInspectRent
    public function InspectProperty($id){
        $pid = Property::findOrFail($id);
        return view('frontpage.book_inspection.book_inspection', compact('pid'));
    }
    // StoreInspectProperty
    public function StoreInspectProperty(Request $request){
        // Insert into database
        BookInspection::insert([
            'property_id'=>$request->property_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'inspection_date'=>$request->inspection_date,
            'inspection_time'=>$request->inspection_time,
            'message'=>$request->message,
        ]);
        $data = [
            'Subject' => 'Request to inspect properties.',
            'Message' => 'We appreciate your request to inspect our properties. A mail will be sent to you once your booking application is approved'
        ];
        Mail::to(($request->email))->send(new BookingInspectionMail($data));
        $notification = array(
                'message'=> 'Request Submitted Successfully. A mail has been sent to you',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
