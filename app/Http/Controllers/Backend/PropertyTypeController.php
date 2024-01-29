<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    // AddType
    public function AddType(){
        return view('backend.type.add_type');
    }
    // Store Type
    public function StoreType(Request $request){

        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
        ]);

        // Insert into database
        PropertyType::insert([
            'type_name'=>$request->type_name,
        ]);
        $notification = array(
                'message'=> 'Property Type Created Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }
    // All Property Types
    public function AllType(){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_types', compact('types'));
    }
    // Edit Property Type
    public function TypeEdit($id){
        $editTypes = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('editTypes'));
    }
    // UpdateType
    public function UpdateType(Request $request){
        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name
        ]);
        $notification = array(
            'message'=> 'Property Type Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }
    // TypeDelete
    public function TypeDelete($id){
        PropertyType::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Property Type Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}