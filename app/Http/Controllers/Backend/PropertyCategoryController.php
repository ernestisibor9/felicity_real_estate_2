<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;
use Carbon\Carbon;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PropertyCategoryController extends Controller
{
    // AddPropertyCategory
    public function AddPropertyCategory(){
        $property = Property::latest()->get();
        return view('backend.category.add_category', compact('property'));
    }
    // StoreCategory
    public function StoreCategory(Request $request){
        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // read image from file system
        $img = $manager->read($image);
        $img = $img->resize(600, 800);

        // save modified image in new format 
        $img->toJpeg(80)->save(base_path('public/upload/property/category/'.$name_gen));

        $save_url = 'upload/property/category/'.$name_gen;

        PropertyCategory::insert([
            'category_name' => $request->category_name,
            'photo' => $save_url,
            'city_id' => $request->city_id,
            'price' => $request->price,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=> 'Property Category Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.property.category')->with($notification);
    }
    // AllPropertyCategory
    public function AllPropertyCategory(){
        // $property = Property::latest()->get();
        $category = PropertyCategory::latest()->get();
        return view('backend.category.all_category', compact('category'));
    }
    // EditCatgegory
    public function EditCatgegory($id){
        $propertyCategory = PropertyCategory::findOrFail($id);
        $property = Property::latest()->get();
        $propertyCat = PropertyCategory::latest()->get();

        return view('backend.category.edit_category', compact('property','propertyCategory', 'propertyCat'));
    }
    // UpdateCatyegory
    public function UpdateCategory(Request $request){
        $pid = $request->id;

        if($request->file('photo')){
            // create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // read image from file system
            $img = $manager->read($image);
            $img = $img->resize(600, 800);

            // save modified image in new format 
            $img->toJpeg(80)->save(base_path('public/upload/property/category/'.$name_gen));

            $save_url = 'upload/property/category/'.$name_gen;

            PropertyCategory::findOrFail($pid)->update([
                'category_name' => $request->category_name,
                'photo' => $save_url,
                'city_id' => $request->city_id,
                'price' => $request->price,
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            PropertyCategory::findOrFail($pid)->update([
                'category_name' => $request->category_name,
                'city_id' => $request->city_id,
                'price' => $request->price,
                'updated_at' => Carbon::now(),
            ]);
        }
            $notification = array(
                'message'=> 'Property Category Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.property.category')->with($notification);
    }
       // DeleteProperty
       public function DeleteCategory($id){
        $deleteId = PropertyCategory::findOrFail($id);
        unlink($deleteId->photo);

        PropertyCategory::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Property Category Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
