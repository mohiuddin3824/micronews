<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    // Auth
     public function __construct()
     {
        $this->middleware('auth');
     }

    public function index(){
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function createUser(){
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function storeUser(Request $request){
        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'email',
        ]);

        $image = $request->file('profile_photo');
        
        if($image){
            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('backend/images/users/'.$name_gen);
            $save_url = 'backend/images/users/'.$name_gen;
            User::insert([
                'role_id' =>$request->role_id,
                'name' =>$request->name,
                'email' =>$request->email,
                'description' =>$request->description,
                'password' =>Hash::make($request->password),
                'profile_photo' =>$save_url,
                'created_at' => Carbon::now(),
            ]);
        }else{
            User::insert([
                'role_id' =>$request->role_id,
                'name' =>$request->name,
                'email' =>$request->email,
                'description' =>$request->description,
                'password' =>Hash::make($request->password),
                'created_at' => Carbon::now(),
            ]);
        }
        

        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.users')->with($notification);
    }

     //Edit User
     public function editUser($user_id){
        $roles = Role::all();
        $editUser = User::findOrFail($user_id);
        return view('admin.users.edit', compact('roles','editUser'));
    }

    //Update User
    public function updateUser(Request $request){
        $user_id = $request->id;
        
        $image = $request->file('profile_photo');
            
        $oldimage = $request->oldimage;

        if($image){
            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('backend/images/users/'.$name_gen);
            $save_url = 'backend/images/users/'.$name_gen;
            if($oldimage){
                unlink($oldimage);
            }

            User::findOrFail($user_id)->update([
                'role_id' =>$request->role_id,
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'description' =>$request->description,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instagram' =>$request->instagram,
                'youtube' =>$request->youtube,
                'profile_photo' =>$save_url,
                'created_at' => Carbon::now(),
            ]);
        }else{
            User::findOrFail($user_id)->update([
                'role_id' =>$request->role_id,
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'description' =>$request->description,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instagram' =>$request->instagram,
                'youtube' =>$request->youtube,
                'profile_photo' =>$oldimage,
                'created_at' => Carbon::now(),
            ]); 
        }
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    
    }

    //=========== User Updates User's profile ================//
    public function userEditprofile($u_id){
    $editUserProfile = User::findOrFail($u_id);
    return view('admin.users.edit-user-profile', compact('editUserProfile'));
    }

    //Update User
    public function userUpdateprofile(Request $request){
        $user_id = $request->u_id;
        
        $image = $request->file('profile_photo');
               
        $oldimage = $request->oldimage;

        if($image){
            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('backend/images/users/'.$name_gen);
            $save_url = 'backend/images/users/'.$name_gen;
            if($oldimage){
                unlink($oldimage);
            }

            User::findOrFail($user_id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'description' =>$request->description,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instagram' =>$request->instagram,
                'youtube' =>$request->youtube,
                'profile_photo' =>$save_url,
                'created_at' => Carbon::now(),
            ]);
        }else{
            User::findOrFail($user_id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'description' =>$request->description,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instagram' =>$request->instagram,
                'youtube' =>$request->youtube,
                'profile_photo' =>$oldimage,
                'created_at' => Carbon::now(),
            ]); 
        }
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
       
    }


    //SoftDdelete User
    public function sdeleteUser($id){
        User::find($id)->delete();
    
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.users')->with($notification);
    }

    //Trashed Users
    public function trashedUsers(){
        $trashUsers = User::onlyTrashed()->get();
        return view('admin.users.trashed', compact('trashUsers'));
    }

    //Restore Users
    public function restoreUser($id){
        User::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'User Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.users')->with($notification);
    }

    //Permanent Delete Category
    public function deleteUser($id){
    
        
        $user = DB::table('users')->where('id',$id)->first();
        if($user->profile_photo){
        unlink($user->profile_photo);
        }

        DB::table('users')->where('id',$id)->delete();
        $notification = array(
            'message' => 'User Deleted Permanently!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.users')->with($notification);
    }

    //User Profile 
    public function userProfile(){
        $userProfile = Auth::user();
        
        return view('admin.users.profile', compact('userProfile'));
    }

    //user Password Reset
    public function resetPass(){
        return view('admin.users.reset-pass');
    }

    //Update Password
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

       if (Hash::check($current_password,$db_pass)) {
          if ($newpass === $confirmpass) {
              User::findOrFail(Auth::id())->update([
                'password' => Hash::make($newpass)
              ]);

              Auth::logout();
              $notification=array(
                'message'=>'Your Password Change Success. Now Login With New Password',
                'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);

          }else {

            $notification=array(
                'message'=>'New Password And Confirm Password Not Same',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
          }
       }else {
        $notification=array(
            'message'=>'Old Password Not Match',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
       }
    }

    // User news for admin dashboard
    public function adminUserWiseNews($user_name){
        $user = User::where('name', $user_name)->first();
        $userWiseNews = Post::where('user_id', $user->id)->orderBy('id', 'DESC')->take(10)->get();           
        
        
        return view('admin.users.user-posts', compact('user', 'userWiseNews'));        
       
    }

    //User Active of Inactive by super Admin
    public function adminBlockUser($id){
        User::findOrFail($id)->update(['status' => 0]);
        $notification=array(
            'message'=>'User Blocked!',
            'alert-type'=>'warning'
        );
        return Redirect()->back()->with($notification);
    }
    
    public function adminUnBlockUser($id){
        User::findOrFail($id)->update(['status' => 1]);
        $notification=array(
            'message'=>'User Activated!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    
    }
      

}
