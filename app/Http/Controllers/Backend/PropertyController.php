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
        $img = $img->resize(600, 800);

        // save modified image in new format 
        $img->toJpeg(80)->save(base_path('public/upload/property/thumbnail/'.$name_gen));

        $save_url = 'upload/property/thumbnail/'.$name_gen;

        $property_id = Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace('', '-', $request->property_name)),
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,

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
            $img3 = $img2->resize(600, 800);
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
        return redirect()->back()->with($notification);
    }
    // AllProperty
    public function AllProperty(){
        
    }
}