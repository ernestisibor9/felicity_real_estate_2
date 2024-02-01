<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\RentProperty;

use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;

class RentPropertyController extends Controller
{
    // RentProperty
    public function RentProperty(){
        $property = Property::where('property_status', 'rent')->latest()->get();
        return view('frontpage.tenant.rent_property', compact('property'));
    }
    // RentPropertyTenant
    public function RentPropertyTenant($id){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::findOrFail($id);
        $propertyAll = Property::latest()->get();
        return view('frontpage.tenant.rent_property_tenant', compact('property', 'propertyAll', 'propertyTypes'));
    }
    // StoreRentProperty
    public function StoreRentProperty(Request $request){
        $rentCategory = $request->rent_category;
        
        // Insert into database
        RentProperty::insert([
            'title'=>$request->title,
            'surname'=>$request->surname,
            'firstname'=>$request->firstname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'rent_category'=>$rentCategory,
            'workplace'=>$request->workplace,
            'evicted'=>$request->evicted,
            'rented_before'=>$request->rented_before,
            'employment_status'=>$request->employment_status,
            'background_checks'=>$request->background_checks,
            'additional_information'=>$request->additional_information,
            'additional_requests'=>$request->additional_requests,
            'status' => '1'
        ]);
        $data = [
            'Subject' => 'Request to buy properties.',
            'Message' => 'We appreciate your request to buy our properties. We have attached an ebook to guide you more on real estate. Thanks'
        ];
        Mail::to(($request->email))->send(new ScheduleMail($data));
        $notification = array(
                'message'=> 'Request Submitted Successfully. You can check your mail for a free ebook',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
