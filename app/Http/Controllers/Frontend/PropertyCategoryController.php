<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\BuyProperty;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;
use App\Models\City;

class PropertyCategoryController extends Controller
{
    // FinishedProperty
    public function FinishedProperty(){
        $property = Property::where('property_category', 'finished_property')->where('status', '1')->latest()->get(); 
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
        $propertyAll = Property::where('status', '1')->latest()->get();
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
        $propertyAll = Property::where('status', '1')->latest()->get();
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
        // $property = Property::where('property_category', 'unfinished_property')->latest()->get(); 
        $property = Property::where('property_category', 'unfinished_property')->latest()->paginate(3);
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
        $finishedProperties = Property::where('property_category','finished_property')->where('status', '1')->latest()->get();
        $unfinishedProperties = Property::where('property_category','unfinished_property')->where('status', '1')->latest()->get();
        $rent = Property::where('property_status','rent')->where('status', '1')->latest()->get();
        $land = Property::where('property_category','land')->where('status', '1')->latest()->get();
        return view('frontpage.property.show_all_property', compact('finishedProperties', 'unfinishedProperties', 'land', 'rent' ));
    }
    //
     // Land Property
     public function LandProperty(){
        $propertyTypes = PropertyType::latest()->get(); 
        $property = Property::where('property_category','land')->where('status', '1')->latest()->get(); 
        return view('frontpage.property.land_property', compact('propertyTypes', 'property'));
    }
    // ShortLetProperty
    public function ShortLetProperty(){
        $property = Property::where('property_status','let')->where('status', '1')->latest()->paginate(3); 
        return view('frontpage.property.short_let_property', compact('property'));
    }
    // FinishedProperty2
    public function FinishedProperty2(){
        // $property = Property::where('property_category','finished_property')->where('status','1')->groupBy('city')->pluck('city');
        $cities = City::orderBy('city', 'ASC')->get();
        return view('frontpage.property.select_city_finished', compact('cities'));
    }
    public function Lekki(){
        $city = Property::where('city', 'Lekki')->latest()->get();
        return view('frontpage.property.lekki', compact('city'));
    }
    // PropertyTypes
    public function PropertyTypes(){
        $types = PropertyType::latest()->get();
        return view('frontpage.types.property_checkbox', compact('types'));
    }
    // SearchPropertyCity
    public function SearchPropertyCity(Request $request){
        $cityId = $request->city_id;
        //dd($cityId);
        $prop = Property::where('city_id', $cityId)->where('property_category', 'finished_property')->first();
        $property = Property::where('city_id', $cityId)->where('property_category', 'finished_property')->get();
        $propertyType = PropertyType::orderBy('type_name', 'ASC')->get();

        if($prop){
            return view('frontpage.property.city_property', compact('property', 'prop', 'propertyType'));
        }
        else{
            // echo "<h1>No information available</h1>";
            $notification = array(
                'message'=> 'No property available in the choosen location',
                'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
        }
        
    }
    // SearchPropertyType
    public function SearchPropertyType(Request $request){
        $ptypeId = $request->ptype_id;
        $cityId = $request->city_id;
        // dd($ptypeId);
        try{
            $prop = Property::where('ptype_id', $ptypeId )->where('city_id', $cityId)->where('property_category', 'finished_property')->first();
            $property = Property::where('ptype_id', $ptypeId )->where('city_id', $cityId)->where('property_category', 'finished_property')->get();
            $propertyType = PropertyType::orderBy('type_name', 'ASC')->get();
    
            return view('frontpage.property.property_type_finished', compact('property', 'prop', 'propertyType'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // UnFinishedProperty2
    public function UnFinishedProperty2(){
        $cities = City::orderBy('city', 'ASC')->get();
        return view('frontpage.property.select_city_unfinished', compact('cities'));
    }
    //
    // SearchPropertyCity - unfinish
    public function SearchPropertyCity2(Request $request){
        $cityId = $request->city_id;
        //dd($cityId);
        $prop = Property::where('city_id', $cityId)->where('property_category', 'unfinished_property')->first();
        $property = Property::where('city_id', $cityId)->where('property_category', 'unfinished_property')->get();
        $propertyType = PropertyType::orderBy('type_name', 'ASC')->get();

        if($prop){
            return view('frontpage.property.city_property_unfinished', compact('property', 'prop', 'propertyType'));
        }
        else{
            // echo "<h1>No information available</h1>";
            $notification = array(
                'message'=> 'No property available in the choosen location',
                'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
        }
        
    }
    // SearchPropertyType2
    public function SearchPropertyType2(Request $request){
        $ptypeId = $request->ptype_id;
        $cityId = $request->city_id;
        // dd($ptypeId);
        try{
            $prop = Property::where('ptype_id', $ptypeId )->where('city_id', $cityId)->where('property_category', 'unfinished_property')->first();
            $property = Property::where('ptype_id', $ptypeId )->where('city_id', $cityId)->where('property_category', 'unfinished_property')->get();
            $propertyType = PropertyType::orderBy('type_name', 'ASC')->get();
    
            return view('frontpage.property.property_type_unfinished', compact('property', 'prop', 'propertyType'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // LandPropertyCity
    public function LandPropertyCity(){
        $cities = City::orderBy('city', 'ASC')->get();
        return view('frontpage.property.select_city_land', compact('cities'));
    }
    //SearchPropertyCityLand
    public function SearchPropertyCityLand(Request $request){
        $cityId = $request->city_id;
        //dd($cityId);
        $prop = Property::where('city_id', $cityId)->where('property_category', 'land')->first();
        $property = Property::where('city_id', $cityId)->where('property_category', 'land')->get();
        $propertyType = PropertyType::orderBy('type_name', 'ASC')->get();

        if($prop){
            return view('frontpage.property.city_property_land', compact('property', 'prop', 'propertyType'));
        }
        else{
            // echo "<h1>No information available</h1>";
            $notification = array(
                'message'=> 'No property available in the choosen location',
                'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
        }
        
    }
    // Search Property Type3
    public function SearchPropertyType3(Request $request){
        $ptypeId = $request->ptype_id;
        $cityId = $request->city_id;
        // dd($ptypeId);
        try{
            $prop = Property::where('ptype_id', $ptypeId )->where('city_id', $cityId)->where('property_category', 'land')->first();
            $property = Property::where('ptype_id', $ptypeId )->where('city_id', $cityId)->where('property_category', 'land')->get();
            $propertyType = PropertyType::orderBy('type_name', 'ASC')->get();
    
            return view('frontpage.property.property_type_land', compact('property', 'prop', 'propertyType'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
