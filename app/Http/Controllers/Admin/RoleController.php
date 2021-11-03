<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RoleController extends Controller
{
    // Auth
     public function __construct()
     {
         $this->middleware('auth');
     }

     //all roles
     
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    //Crete New Role
    public function createRole(){
        return view('admin.roles.create');
    }

    //Store Role
    public function storeRole(Request $request){
        $request->validate([
            'role' => 'required|unique:roles|max:255',
        ]);

        Role::insert([
            'role' =>$request->role,
            'post' =>$request->post,
            'category' =>$request->category,
            'division' =>$request->division,
            'district' =>$request->district,
            'menu' =>$request->menu,
            'photo_gallery' =>$request->photo_gallery,
            'video' =>$request->video,
            'seo' =>$request->seo,
            'general_setting' =>$request->general_setting,
            'header' =>$request->header,
            'footer' =>$request->footer,
            'ads' =>$request->ads,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    //Edit Role
    public function editRole($role_id){
        $editRole = Role::findOrFail($role_id);
        return view('admin.roles.edit', compact('editRole'));
    }

    //Update 
    public function updateRole(Request $request){
        $role_id = $request->id;
       

        Role::findOrFail($role_id)->update([
            'role' =>$request->role,
            'post' =>$request->post,
            'category' =>$request->category,
            'division' =>$request->division,
            'district' =>$request->district,
            'menu' =>$request->menu,
            'photo_gallery' =>$request->photo_gallery,
            'video' =>$request->video,
            'seo' =>$request->seo,
            'general_setting' =>$request->general_setting,
            'header' =>$request->header,
            'footer' =>$request->footer,
            'ads' =>$request->ads,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function deleteRole($id){
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }
}
