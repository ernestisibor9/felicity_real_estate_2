<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\BuyProperty;

use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;

class InvestorController extends Controller
{
    //
    public function InvestorProperty(){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::latest()->get(); 
        return view('frontpage.investor.buy_property', compact('propertyTypes', 'property'));
    }
    // StoreInvestorBuy
    public function StoreInvestorBuy(Request $request){
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
            'buy_category'=>$request->buy_category,
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
