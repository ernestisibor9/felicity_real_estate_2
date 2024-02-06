<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\BuyProperty;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;

class PropertyCategoryController extends Controller
{
    // FinishedProperty
    public function FinishedProperty(){
        $property = Property::where('property_category', 'finished_property')->latest()->get(); 
        return view('frontpage.category.finished_property', compact('property'));
    }
    // FinishPropertyDetails
    public function FinishPropertyDetails($id){
        $pid = Property::findOrFail($id);
        return view('frontpage.category.finished_property_details', compact('pid'));
    }
    // BuyFinishedProperty
    public function BuyFinishedProperty($id){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::findOrFail($id);
        $propertyAll = Property::latest()->get();
        return view('frontpage.category.buy_finished_property', compact('property', 'propertyAll', 'propertyTypes'));
    }
    // BuyFinishedProperty
    // public function BuyFinishedProperty2($id){
    //     $propertyTypes = PropertyType::latest()->get(); 
    //     $property = Property::findOrFail($id);
    //     $propertyAll = Property::latest()->get();
    //     return view('frontpage.category.buy_finished_property', compact('property', 'propertyAll', 'propertyTypes'));
    // }
    // StoreFinishedBuy
    public function  StoreFinishedBuy(Request $request){
        $buyCategory = $request->buy_category;
        
        // Insert into database
        BuyProperty::insert([
            'title'=>$request->title,
            'surname'=>$request->surname,
            'firstname'=>$request->firstname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'buy_category'=>$buyCategory,
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
    // UnFinishedProperty
    public function BuyUnFinishedProperty($id){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::findOrFail($id);
        $propertyAll = Property::latest()->get();
        return view('frontpage.category.buy_unfinished_property', compact('property', 'propertyAll', 'propertyTypes'));
    }
    // StoreUnFinishedBuy
    public function  StoreUnFinishedBuy(Request $request){
        $buyCategory = $request->buy_category;
        
        // Insert into database
        BuyProperty::insert([
            'title'=>$request->title,
            'surname'=>$request->surname,
            'firstname'=>$request->firstname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'buy_category'=>$buyCategory,
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
    // Unfinished Property
    public function UnFinishedProperty(){
        $property = Property::where('property_category', 'unfinished_property')->latest()->get(); 
        return view('frontpage.category.unfinished_property', compact('property'));
    }
    // 
    // UnFinishPropertyDetails
    public function UnFinishPropertyDetails($id){
        $pid = Property::findOrFail($id);
        return view('frontpage.category.unfinished_property_details', compact('pid'));
    }

    // ShowAllProperties
    public function ShowAllProperties(){
        $finishedProperties = Property::where('property_category','finished_property')->latest()->get();
        $unfinishedProperties = Property::where('property_category','unfinished_property')->latest()->get();
        $land = Property::where('property_category','land')->latest()->get();
        return view('frontpage.property.show_all_property', compact('finishedProperties', 'unfinishedProperties', 'land'));
    }
    
}
