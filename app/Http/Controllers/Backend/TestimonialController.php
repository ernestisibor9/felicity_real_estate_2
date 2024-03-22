<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use App\Models\Testimonial;
use Carbon\Carbon;

class TestimonialController extends Controller
{
    // AddTestimonial
    public function AddTestimonial(){
        return view("backend.testimonial.add_testimonial");
    }
    // StoreTestimonial
    public function StoreTestimonial(Request $request){
        $request->validate([
            'photo' => 'required|image|max:1024|mimes:jpg,jpeg,png,gif',
        ]);
        // Without Imagick 
        $image = $request->file('photo');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/property/testimonial/'), $filename);

        $save_url = 'upload/property/testimonial/' . $filename;
        // // create new manager instance with desired driver
        // $manager = new ImageManager(new Driver());

        // $image = $request->file('photo');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // // read image from file system
        // $img = $manager->read($image);
        // $img = $img->resize(550, 450);

        // // save modified image in new format 
        // $img->toJpeg(80)->save(base_path('public/upload/testimonial/'.$name_gen));

        // $save_url = 'upload/testimonial/'.$name_gen;

        Testimonial::insert([
            'name' => $request->name,
            'message' => $request->message,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=> 'Testimonial Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.testimonial')->with($notification);
    }
    // AllTestimonial
    public function AllTestimonial(){
        $testimonial = Testimonial::latest()->get();
        return view("backend.testimonial.all_testimonial", compact("testimonial"));
    }
    // Edit Testimonial
    public function EditTestimonial($id){
        $editTestimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit_testimonial', compact('editTestimonial'));
    }
    // Update Testimonial
    public function UpdateTestimonial(Request $request){
        $pid = $request->id;

        if($request->file('photo')){
            // // create new manager instance with desired driver
            // $manager = new ImageManager(new Driver());

            // $image = $request->file('photo');
            // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // // read image from file system
            // $img = $manager->read($image);
            // $img = $img->resize(550, 450);

            // // save modified image in new format 
            // $img->toJpeg(80)->save(base_path('public/upload/testimonial/'.$name_gen));

            // $save_url = 'upload/testimonial/'.$name_gen;
            $request->validate([
                'photo' => 'required|image|max:1024',
            ]);
            // Without Imagick 700 x 800
            $image = $request->file('photo');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/property/testimonial/'), $filename);
    
            $save_url = 'upload/property/testimonial/' . $filename;

            Testimonial::findOrFail($pid)->update([
                'name' => $request->name,
                'message' => $request->message,
                'photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        else{
            Testimonial::findOrFail($pid)->update([
                'name' => $request->name,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
        }
            $notification = array(
                'message'=> 'Testimonial Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.testimonial')->with($notification);
    }
    // Delete Testimonial
    public function DeleteTestimonial($id){
        $deleteId = Testimonial::findOrFail($id);
        unlink($deleteId->photo);

        Testimonial::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Testimonial Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
