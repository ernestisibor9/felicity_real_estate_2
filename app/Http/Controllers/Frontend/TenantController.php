<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\BuyProperty;
// use App\Models\PropertyCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;

class TenantController extends Controller
{
    //
    public function TenantPage(){
        return view('frontpage.tenant.tenant_page');
    }
    // TenantBuyProperty
    public function TenantBuyProperty(){
        return view('frontpage.tenant.buy_property');
    }
    
    // UnFinished Property
    public function UnFinishedProperty(){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::latest()->get(); 
        return view('frontpage.tenant.unfinished_property', compact('propertyTypes', 'property'));
    }
    
    // Land Property
    public function LandProperty(){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::latest()->get(); 
        return view('frontpage.tenant.land_property', compact('propertyTypes', 'property'));
    }
    // StoreLandBuy
    public function StoreLandBuy(Request $request){
        // $request->validate([
        //     'type_name' => 'required|unique:property_types|max:200',
        // ]);

        // Insert into database
        BuyProperty::insert([
            'title'=>$request->title,
            'surname'=>$request->surname,
            'firstname'=>$request->firstname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'ptype_id'=>$request->ptype_id,
            'budget'=>$request->budget,
            'buy_category'=>'land property',
            'city_id'=>$request->city_id,
            'amenities'=>$request->amenities,
            'state_of_community'=>$request->state_of_community,
            'property_size'=>$request->property_size,
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
