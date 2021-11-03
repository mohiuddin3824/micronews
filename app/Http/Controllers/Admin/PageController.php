<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
     // Auth
     public function __construct()
     {
         $this->middleware('auth');
     }

     public function index(){
        $pages = Page::orderBy('id', 'DESC')->get();
        return view('admin.pages.index', compact('pages'));
     }

     public function createPage(){
        return view('admin.pages.create');
    }

    //Store Post
    public function storePage(Request $request){
        $request->validate([
            'title' => 'required',
        ]);

        $image = $request->file('image');

            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('frontend/assets/images/pages/'.$name_gen);
            $save_url = 'frontend/assets/images/pages/'.$name_gen;

        Page::insert([
            'title' =>$request->title,
            'slug' =>str_replace(' ', '-', $request->title),
            'image' =>$save_url,            
            'description' =>$request->description,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Page Published Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);

    }//end insert post

    //Edit Post
    public function editPage($page_id){
        $editPage = Page::findOrFail($page_id);
        
        return view('admin.pages.edit', compact('editPage'));
    }

    //Update Post
    public function updatePage(Request $request){
        $page_id = $request->id;

        $oldimage = $request->oldimage;

        $image = $request->file('image');

        if($image){
            

            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('frontend/assets/images/pages/'.$name_gen);
            $save_url = 'frontend/assets/images/pages/'.$name_gen;
            if($oldimage){
                unlink($oldimage);
            }
        Page::findOrfail($page_id)->update([
            'title' =>$request->title,
            'slug' =>$request->slug,
            'image' =>$save_url,            
            'description' =>$request->description,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Page Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);

        }else{
        Page::findOrfail($page_id)->update([
            'title' =>$request->title,
            'slug' =>$request->slug,
            'image' =>$oldimage,            
            'description' =>$request->description,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        }

        $notification = array(
            'message' => 'Page Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);

    }//end insert post

     //Permanent Delete Post
    public function deletePage($id){
        
        $page = DB::table('pages')->where('id',$id)->first();
        
        unlink($page->image);
        

        DB::table('pages')->where('id',$id)->delete();
        
        $notification = array(
            'message' => 'Page Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.pages')->with($notification);
    }


}
