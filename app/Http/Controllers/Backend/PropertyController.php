<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
    public function AddProperty(){
        $propertyTypes = PropertyType::latest()->get();
        return view('backend.property.add_property', compact("propertyTypes"));
    }
    // StoreProperty
    public function StoreProperty(Request $request){
        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // read image from file system
        $img = $manager->read($image);
        $img = $img->resize(700, 800);

        // save modified image in new format 
        $img->toJpeg(80)->save(base_path('public/upload/property/thumbnail/'.$name_gen));

        $save_url = 'upload/property/thumbnail/'.$name_gen;

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
            'city' => $request->city,
            'state' => $request->state,
            'featured' => $request->featured,
            'hot' => $request->hot,

            'status' => 1,
            'property_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // Multiple images
        $images = $request->file('multi_img');
        
        foreach($images as $img1){
            //create new manager instance with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen2 = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
           // read image from file system
            $img2 = $manager->read($img1);
            $img3 = $img2->resize(700, 800);
           // save modified image in new format 
            $img3->toJpeg(80)->save(base_path('public/upload/property/multi_images/'.$name_gen2));
            $save_url2 = 'upload/property/multi_images/'.$name_gen2;

           // Insert Data into Multi Img table
            MultiImage::insert([
                'property_id' => $property_id,
                'photo_name' => $save_url2,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message'=> 'Property Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.property')->with($notification);
    }
    // AllProperty
    public function AllProperty(){
       $property = Property::latest()->get();
       return view('backend.property.all_property', compact('property'));
    }
    // change.property.status
    public function ChangePropertyStatus($id){
        $userId = Property::findOrFail($id);

        if($userId){
            if($userId->status){
                $userId->status = 0;
            }
            else{
                $userId->status = 1;
            }
            $userId->save();
        }
        return back();
    }
    // DeleteProperty
    public function DeleteProperty($id){
        $deleteId = Property::findOrFail($id);
        unlink($deleteId->property_thumbnail);

        Property::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Property Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // 
    public function EditProperty($id){

        $property = Property::findOrFail($id);
        $propertyAll = Property::latest()->get();
        $propertyTypes = PropertyType::latest()->get();

        return view('backend.property.edit_property',compact('property','propertyTypes', 'propertyAll'));
    }
    // update.property
    public function UpdateProperty(Request $request){
        $pid = $request->id;

        if($request->file('property_thumbnail')){
            // create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            $image = $request->file('property_thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // read image from file system
            $img = $manager->read($image);
            $img = $img->resize(700, 800);

            // save modified image in new format 
            $img->toJpeg(80)->save(base_path('public/upload/property/thumbnail/'.$name_gen));

            $save_url = 'upload/property/thumbnail/'.$name_gen;

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
                'city' => $request->city,
                'state' => $request->state,
                'featured' => $request->featured,
                'hot' => $request->hot,

                'status' => 1,
                'property_thumbnail' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        else{
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
                'city' => $request->city,
                'state' => $request->state,
                'featured' => $request->featured,
                'hot' => $request->hot,

                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
            $notification = array(
                'message'=> 'Property Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.property')->with($notification);
    }
}