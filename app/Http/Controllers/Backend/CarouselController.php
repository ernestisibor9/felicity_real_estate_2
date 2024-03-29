<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use App\Models\Carousel;
use Carbon\Carbon;

class CarouselController extends Controller
{
    // AddCarousel
    public function AddCarousel(){
        return view('backend.carousel.add_carousel');
    }
    // StoreCarousel
    public function StoreCarousel(Request $request){

        $request->validate([
            'photo_slide' => 'required|image|max:1024|mimes:jpg,jpeg,png,gif',
        ]);
        // Without Imagick 
        $image = $request->file('photo_slide');
        $filename = date('YmdHi') . $image->getClientOriginalExtension();
        $image->move(public_path('upload/property/slides/'), $filename);

        $save_url = 'upload/property/slides/'.$filename;
        // // create new manager instance with desired driver
        // $manager = new ImageManager(new Driver());

        // $image = $request->file('photo_slide');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // // read image from file system
        // $img = $manager->read($image);
        // $img = $img->resize(1400, 1500);

        // // save modified image in new format 
        // $img->toJpeg(80)->save(base_path('public/upload/property/slides/'.$name_gen));

        // $save_url = 'upload/property/slides/'.$name_gen;

        Carousel::insert([
            'property_name' => $request->property_name,
            'price' => $request->price,
            'photo_slide' => $save_url,
            'city' => $request->city,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=> 'Slider Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.carousel')->with($notification);
    }
    // AllCarousel
    public function AllCarousel(){
        $carousel = Carousel::latest()->get();
        return view('backend.carousel.all_carousel', compact('carousel'));
    }
    // EditCarousel
    public function EditCarousel($id){
        $editCarousel = Carousel::findOrFail($id);
        $carousel = Carousel::latest()->get();
        return view('backend.carousel.edit_carousel', compact('editCarousel', 'carousel'));
    }
    // UpdateCarousel
    public function UpdateCarousel(Request $request){
        
        $pid = $request->id;
        $photoSlider = $request->photo_caro;

        if($request->file('photo_slide')){
            $request->validate([
                'photo_slide' => 'required|image|max:1024',
            ]);
            // Without Imagick 
            unlink(public_path($photoSlider));
            $image = $request->file('photo_slide');
            $filename = date('YmdHi') . $image->getClientOriginalExtension();
            $image->move(public_path('upload/property/slides/'), $filename);
    
            $save_url = 'upload/property/slides/'.$filename;
            // // create new manager instance with desired driver
            // $manager = new ImageManager(new Driver());

            // $image = $request->file('photo_slide');
            // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // // read image from file system
            // $img = $manager->read($image);
            // $img = $img->resize(1400, 1500);

            // // save modified image in new format 
            // $img->toJpeg(80)->save(base_path('public/upload/property/slides/'.$name_gen));

            // $save_url = 'upload/property/slides/'.$name_gen;

            Carousel::findOrFail($pid)->update([
                'property_name' => $request->property_name,
                'price' => $request->price,
                'photo_slide' => $save_url,
                'city' => $request->city,
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            Carousel::findOrFail($pid)->update([
                'property_name' => $request->property_name,
                'price' => $request->price,
                'city' => $request->city,
                'created_at' => Carbon::now(),
            ]);
        }
            $notification = array(
                'message'=> 'Carousel Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.carousel')->with($notification);
    }
    // Delete Carousel
    public function DeleteCarousel($id){
        $deleteId = Carousel::findOrFail($id);
        unlink($deleteId->photo_slide);

        Carousel::findOrFail($id)->delete();

        $notification = array(
                'message'=> 'Carousel Deleted Successfully',
                'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}






