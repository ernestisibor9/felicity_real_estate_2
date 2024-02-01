<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookInspection;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookingInspectionMail;


class AdminInspectionController extends Controller
{
    // AdminBookingInspect
    public function AdminBookingInspect(){
        $booking = BookInspection::latest()->get();
        return view('backend.inspection.manage_inspection', compact('booking'));
    }
    // InspectPropertyStatus
    public function InspectPropertyStatus($id){
        $userId = BookInspection::findOrFail($id);

        if($userId){
            if($userId->status){
                $userId->status = 0;
            }
            else{
                $userId->status = 1;
            }
            $userId->save();

            $data = [
                'Subject' => 'Your request to inspect properties has been approved.',
                'Message' => 'We have approved your request to inspect our properties. You can now come as per when due'
            ];
            Mail::to(($userId->email))->send(new BookingInspectionMail($data));
            $notification = array(
                    'message'=> 'A mail has been sent to this user for inspection',
                    'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        return back();
    }
}
