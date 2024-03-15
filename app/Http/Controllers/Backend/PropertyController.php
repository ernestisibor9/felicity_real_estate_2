<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyType;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PropertyController extends Controller
{
    // AddProperty
    public function AddProperty()
    {
        $propertyTypes = PropertyType::latest()->get();
        $cities = City::orderBy('city', 'ASC')->get();
        return view('backend.property.add_property', compact("propertyTypes", "cities"));
    }
    // StoreProperty
    public function StoreProperty(Request $request)
    {

        $request->validate([
            'property_name' => 'required',
            'property_thumbnail' => 'required|image|max:1024|mimes:jpg,jpeg,png,gif',
        ]);

        // Without Imagick 700 x 800
        $image = $request->file('property_thumbnail');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/property/thumbnail/'), $filename);

        $save_url = 'upload/property/thumbnail/' . $filename;


        $property_id = Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace('', '-', $request->property_name)),
            'property_status' => $request->property_status,
            'price' => $request->price,
            'property_category' => $request->property_category,

            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,

            'address' => $request->address,
            'city_id' => $request->city_id,
            'state' => $request->state,
            'featured' => $request->featured,
            'hot' => $request->hot,

            'status' => 1,
            'property_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // Multiple images
        $images = $request->file('multi_img');


        foreach ($images as $img1) {

            // Without Imagick 700 x 800
            // $image2 = $request->file($img1);
            $filename2 = date('YmdHi') . $img1->getClientOriginalName();
            $img1->move(public_path('upload/property/multi_images/'), $filename2);

            $save_url2 = 'upload/property/multi_images/' . $filename2;

            // Insert Data into Multi Img table
            MultiImage::insert([
                'property_id' => $property_id,
                'photo_name' => $save_url2,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }
    // AllProperty
    public function AllProperty()
    {
        $property = Property::latest()->get();
        return view('backend.property.all_property', compact('property'));
    }
    // change.property.status
    public function ChangePropertyStatus($id)
    {
        $userId = Property::findOrFail($id);

        if ($userId) {
            if ($userId->status) {
                $userId->status = 0;
            } else {
                $userId->status = 1;
            }
            $userId->save();
        }
        return back();
    }
    // DeleteProperty
    public function DeleteProperty($id)
    {
        $deleteId = Property::findOrFail($id);
        unlink($deleteId->property_thumbnail);

        Property::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // 
    public function EditProperty($id)
    {

        $property = Property::findOrFail($id);
        $propertyAll = Property::latest()->get();
        $propertyAll = Property::latest()->get();
        $propertyState = Property::orderBy('state', 'ASC')->distinct()->get(['state']);
        $cityAll = City::orderBy('city', 'ASC')->get();
        $propertyTypes = PropertyType::latest()->get();

        return view('backend.property.edit_property', compact('property', 'propertyTypes', 'propertyAll', 'cityAll', 'propertyState'));
    }
    // update.property
    public function UpdateProperty(Request $request)
    {
        // $request->validate([
        //     'property_thumbnail' => 'required|image|max:1024|mimes:jpg,jpeg,png,gif',
        // ]);

        $pid = $request->id;


        if ($request->file('property_thumbnail')) {
            $request->validate([
                'property_thumbnail' => 'required|image|max:1024|mimes:jpg,jpeg,png,gif',
            ]);
            // Without Imagick 700 x 800
            $image = $request->file('property_thumbnail');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/property/thumbnail/'), $filename);

            $save_url = 'upload/property/thumbnail/' . $filename;

            Property::findOrFail($pid)->update([
                'ptype_id' => $request->ptype_id,
                'property_name' => $request->property_name,
                'property_slug' => strtolower(str_replace('', '-', $request->property_name)),
                'property_status' => $request->property_status,
                'price' => $request->price,
                'property_category' => $request->property_category,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'garage' => $request->garage,
                'property_size' => $request->property_size,
                'property_video' => $request->property_video,

                'address' => $request->address,
                'city_id' => $request->city_id,
                'state' => $request->state,
                'featured' => $request->featured,
                'hot' => $request->hot,

                'status' => 1,
                'property_thumbnail' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Property::findOrFail($pid)->update([
                'ptype_id' => $request->ptype_id,
                'property_name' => $request->property_name,
                'property_slug' => strtolower(str_replace('', '-', $request->property_name)),
                'property_status' => $request->property_status,
                'price' => $request->price,
                'property_category' => $request->property_category,

                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'garage' => $request->garage,
                'property_size' => $request->property_size,
                'property_video' => $request->property_video,

                'address' => $request->address,
                'city_id' => $request->city_id,
                'state' => $request->state,
                'featured' => $request->featured,
                'hot' => $request->hot,

                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }
}
