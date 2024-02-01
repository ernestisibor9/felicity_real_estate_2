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
        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        $image = $request->file('photo_slide');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // read image from file system
        $img = $manager->read($image);
        $img = $img->resize(1500, 1500);

        // save modified image in new format 
        $img->toJpeg(80)->save(base_path('public/upload/property/slides/'.$name_gen));

        $save_url = 'upload/property/slides/'.$name_gen;

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
        return redirect()->back()->with($notification);
    }
}
