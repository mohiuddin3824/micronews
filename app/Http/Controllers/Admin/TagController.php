<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class TagController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Get Tags
    public function tags(){
        $tags = Tags::latest()->orderBy('id', 'ASC')->get();
        return view('admin.tag.index', compact('tags'));
    }
    
    //Create Tags
    public function createTag(){
        return view('admin.tag.create-tag');
    }

    //Store Tags
    public function storeTag(Request $request){
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        
        Tags::create([
            'name' =>$request->name,
            'slug' =>str_replace(' ', '-', $request->name),
            'description' =>$request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tag Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //Edit Tag
    public function editTag($tag_id){
        $tag = Tags::findOrFail($tag_id);
        return view('admin.tag.edit-tag', compact('tag'));
    }

    //Update Tag
    public function updateTag(Request $request){
        $tag_id = $request->tag_id;
       
        $image = $request->file('tag_thumb');
                
        $oldimage = $request->oldimage;
        
       if ($image) {
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->save('frontend/assets/images/tag/'.$name_gen);
           $save_url = 'frontend/assets/images/tag/'.$name_gen;
           if($oldimage){
            unlink($oldimage);
           }
           Tags::findOrFail($tag_id)->update([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'description' =>$request->description,
            'tag_thumb' =>$save_url,
            'thumb_caption' =>$request->thumb_caption,
            'thumb_alt' =>$request->thumb_alt,
            'created_at' => Carbon::now(),
           ]);
      
           $notification = array(
               'message' => 'Tag Updated Successfully',
               'alert-type' => 'success'
           );
      
           return redirect()->back()->with($notification);
       }else{
        Tags::findOrFail($tag_id)->update([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'description' =>$request->description,
            'tag_thumb' =>$oldimage,
            'thumb_caption' =>$request->thumb_caption,
            'thumb_alt' =>$request->thumb_alt,
            'created_at' => Carbon::now(),
           ]);
      
           $notification = array(
               'message' => 'Tag Updated Successfully',
               'alert-type' => 'success'
           );
      
           return redirect()->back()->with($notification);
       }
    }

    //Soft Deleted post
    public function trashTag($id){
        Tags::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Tag Trashed! you can re-store it!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.tags')->with($notification);
    }

    //Trashed Posts
    public function trashedTags(){
        $trashedTags = Tags::onlyTrashed()->get();
        return view('admin.tag.trashed-tags', compact('trashedTags'));
    }

     // Re-store Post
    public function restoreTag($id){
        Tags::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Tag Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.tags')->with($notification);
    }

     //Permanent Delete Tag
    public function deleteTag($id){

        $tag = DB::table('tags')->where('id',$id)->first();
        if($tag->tag_thumb){
            unlink($tag->tag_thumb);
        }
        DB::table('tags')->where('id',$id)->delete();
        
        $notification = array(
            'message' => 'Tag Permanently Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


}
