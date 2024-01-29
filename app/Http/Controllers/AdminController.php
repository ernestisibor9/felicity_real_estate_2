<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class AdminController extends Controller
{
    // AdminDashboard
    public function AdminDashboard(){
        return view('admin.index');
    }
    // Admin Logout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    // Admin Login
    public function AdminLogin(){
        return view('admin.admin_login');
    }
    // AdminProfile
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }
    // AdminProfileStore
    public function AdminProfileStore(Request $request){

        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        $id = Auth::user()->id;
        $data = User::find($id);
        
        if($request->file('photo')){
            // $file = $request->file('photo');
            // $filename = date("YmdHi").$file->getClientOriginalName(); // 23232.ariyan.png
            // $file->move(public_path('upload/admin_images'), $filename);
            // $data['photo'] = $filename; 
            $image = $request->file('photo');

            // read image from file system
            $img = $manager->read($image);
            $img = $img->resize(110, 110);

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // save modified image in new format 
            $img->toJpeg(80)->save(base_path('public/upload/admin_images/'.$name_gen));

            $data['photo'] = $name_gen; 
        }

        // Insert Data into Multi Img table
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();

        $notification = array(
            'message'=> 'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // ChangePassword
    public function ChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.change_password', compact('profileData'));
    }
    // AdminUpdatePassword
    public function AdminUpdatePassword(Request $request){
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
    // Delete User
    public function DeleteUser($id){
        $oldImg = User::findOrFail($id);
        if($oldImg->photo != NULL){
            unlink('upload/user_images/'.$oldImg->photo);
        }

        User::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'User Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // ChangeStatusUser
    public function ChangeStatusUser($id){
        $userId = User::findOrFail($id);
        if($userId->status){
            $userId->status = 0;
        }
        else{
            $userId->status = 1;
        }

        $userId->save();

        $notification = array(
            'message'=> 'User Status Successfully Inactive',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.dashboard')->with($notification);
    }
}