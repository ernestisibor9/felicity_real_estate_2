<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // AddLocation
    public function AddLocation(){
        return view("backend.location.add_location");
    }
    // StoreLocation
    public function StoreLocation(Request $request){
        $request->validate([
            'city' => 'required|unique:cities|max:200',
        ]);

        // Insert into database
        City::insert([
            'city'=>$request->city,
        ]);
        $notification = array(
                'message'=> 'City Added Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.location')->with($notification);
    }
    // AllLocation
    public function AllLocation(){
        $cities = City::latest()->get();
        return view('backend.location.all_location', compact('cities'));
    }
    // EditLocation
    public function EditLocation($id){
        $editLocation = City::findOrFail($id);
        return view('backend.location.edit_location', compact('editLocation'));
    }
    // UpdateLocation
    public function UpdateLocation(Request $request){
        $pid = $request->id;

        City::findOrFail($pid)->update([
            'city' => $request->city
        ]);
        $notification = array(
            'message'=> 'Location Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.location')->with($notification);
    }
    // DeleteLocation
    public function DeleteLocation($id){
        City::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Location Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
