<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MultiImage;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class UserController extends Controller
{
    // Home Page
    public function Index (){
        return view('frontend.index');
    }
    // UseLogin
    public function UseLogin(){
        return view ('auth.login');
    }
    // UserRegister
    public function UserRegister(){
        return view('auth.register');
    }
    // UserLogout
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // UserProfile
    public function UserProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.user_profile_view', compact('profileData'));
    }
    // AdminProfileStore
    public function UserProfileStore(Request $request){

        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        $id = Auth::user()->id;
        $data = User::find($id);
        
        if($request->file('photo')){
            // $file = $request->file('photo');
            // $filename = date("YmdHi").$file->getClientOriginalName(); // 23232.ariyan.png
            // $file->move(public_path('upload/user_images'), $filename);
            // $data['photo'] = $filename; 
            $image = $request->file('photo');

            // read image from file system
            $img = $manager->read($image);
            $img = $img->resize(110, 110);

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // save modified image in new format 
            $img->toJpeg(80)->save(base_path('public/upload/user_images/'.$name_gen));

            $data['photo'] = $name_gen; 
        }

        // Insert Data into Multi Img table
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        // $data->status = '0';

        $data->save();

        $notification = array(
            'message'=> 'User Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // ChangePassword
    public function UserChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.change_password', compact('profileData'));
    }
    // AdminUpdatePassword
    public function UserUpdatePassword(Request $request){
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|confirmed',
        ]);
        // Match the old password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
				'message'=> 'Old Password Does not Match',
				'alert-type'=>'error'
				);
			return back()->with($notification);
        }
        // Update the new password
        User::whereId(auth::user()->id)->update([
            'password'=> Hash::make($request->new_password)
        ]);
        $notification = array(
            'message'=> 'Password Changed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // UserAddProperty
    public function UserAddProperty(){
        $propertyTypes = PropertyType::latest()->get();
        return view('user.add_property', compact('propertyTypes'));
    }
    // UserStoreProperty
    public function UserStoreProperty(Request $request){
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

            'status' => 0,
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
}