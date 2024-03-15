<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // AllPermission
    public function AllPermission(){
        // $roles = Role::all();
        $permissions = Permission::all();
        return view("backend.pages.permission.all_permission", compact("permissions"));
    }
    // AddPermission
    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }
    // StorePermission
    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name'=> $request->group_name,
        ]);
        $notification = array(
                'message'=> 'Permission Created Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    // EditPermission
    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }
    // UpdatePermission
    public function UpdatePermission(Request $request){
        $pid = $request->id;
        Permission::findOrFail($pid)->update([
            'name' => $request->name,
            'group_name'=> $request->group_name,
        ]);
        $notification = array(
                'message'=> 'Permission Updated Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    // DeletePermission
    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message'=> 'Permission Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    // AllRoles
    public function AllRoles(){
        // $roles = Role::all();
        $roles = Role::all();
        return view("backend.pages.roles.all_roles", compact("roles"));
    }
    // AddRoles
    public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }
    // StoreRoles
    public function StoreRoles(Request $request){
        Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
                'message'=> 'Role Created Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
    // EditRoles
    public function EditRoles($id){
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_role', compact('role'));
    }
    // UpdateRoles
    public function UpdateRoles(Request $request){
        $rid = $request->id;
        Role::findOrFail($rid)->update([
            'name' => $request->name,
        ]);
        $notification = array(
                'message'=> 'Role Updated Successfully',
                'alert-type'=>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
    // DeleteRoles
    public function DeleteRoles($id){
        Role::findOrFail($id)->delete();

        $notification = array(
            'message'=> 'Role Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
    // AllRolesPermission
    public function AllRolesPermission(){
        $permissions = Permission::all();
        $roles = Role::all();
        $permissions_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add_role_permission', compact('permissions','roles', 'permissions_groups'));
    }
}
