<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoCat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Get categories
    public function videocategories(){
        $categories = VideoCat::latest()->orderBy('id', 'ASC')->get();
        return view('admin.videoCategory.index', compact('categories'));
    }

    public function videocreateCategory(){
        return view('admin.videoCategory.create-category');
    }

     public function videostoreCategory(Request $request){
         $request->validate([
             'category_name' => 'required|unique:categories|max:255',
             'category_slug' => 'required|unique:categories,category_slug|max:191',
         ]);

         VideoCat::insert([
             'category_name' =>$request->category_name,
             'category_slug' =>$request->category_slug,
             'created_at' => Carbon::now(),
         ]);

         $notification = array(
             'message' => 'Category Added Successfully',
             'alert-type' => 'success'
         );

         return redirect()->route('all.videocategories')->with($notification);
     }

     public function videoeditCategory($vcat_id){
        $category = VideoCat::findOrFail($vcat_id);
        return view('admin.videoCategory.edit', compact('category'));
    }

    //Update Category
    public function videoupdateCategory(Request $request){
        $vcat_id = $request->id;
        VideoCat::findOrFail($vcat_id)->update([
            'category_name' =>$request->category_name,
            'category_slug' =>$request->category_slug,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videocategories')->with($notification);
    }

    
    //SoftDdelete Category
    public function videosoftDeleteCategory($id){
        VideoCat::find($id)->delete();
        
        $notification = array(
            'message' => 'Category Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.videocategories')->with($notification);
    }

    //Trashed Category
    public function videotrashedCategory(){
        $trashCats = VideoCat::onlyTrashed()->get();
        return view('admin.videoCategory.category-trashed', compact('trashCats'));
    }

    //Restore Category
    public function videoreStoreCategory($id){
        VideoCat::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Category Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videocategories')->with($notification);
    }

    //Permanent Delete Category
    public function videopDeleteCategory($id){
        VideoCat::onlyTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videocategories')->with($notification);
    }

    //================ Videos ===============//

    public function allVideos(){
        $allvideos = Video::latest()->orderBy('id', 'DESC')->get();
        return view('admin.video.index', compact('allvideos'));
    }

    //Create New post here
    public function addVideo(){
        $allCats = VideoCat::get();
        $users = User::get();
        return view('admin.video.add-video', compact('allCats', 'users'));
    }

    public function StoreVideo(Request $request){
        $request->validate([
            'video_title' => 'required',
            'video_link' => 'required',
        ]);
        $image = $request->file('video_thumbnail');
        
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(350,235)->save('frontend/assets/images/videos/'.$name_gen);
        $save_url = 'frontend/assets/images/videos/'.$name_gen;

        Video::create([
            'video_title' =>$request->video_title,
            'video_desc' =>$request->video_desc,
            'video_link' =>$request->video_link,
            'category_id' =>$request->video_cat_id,
            'video_thumbnail' =>$save_url,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Video Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videos')->with($notification);
    }
    //Edit Post
    public function editVideo($video_id){
        $editVideo = Video::findOrFail($video_id);
        $allCats = VideoCat::get();
        
        return view('admin.video.edit-video', compact('editVideo', 'allCats'));
    }

    //Update Post
    public function updateVideo(Request $request){
        $video_id = $request->id;
        $image = $request->file('video_thumbnail');
                
        $oldimage = $request->oldimage;
        if($image){
            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,235)->save('frontend/assets/images/videos/'.$name_gen);
            $save_url = 'frontend/assets/images/videos/'.$name_gen;
            if($oldimage){
                unlink($oldimage);
            }
            $video = Video::findOrFail($video_id);
            $video->user_id = Auth::id();
            $video->video_title = $request->video_title;
            $video->video_desc = $request->video_desc;
            $video->video_link = $request->video_link;
            $video->category_id = $request->video_cat_id;
            $video->video_thumbnail = $save_url;
            
            $video->save();
            $notification = array(
                'message' => 'Video Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.videos')->with($notification);
        }else{
            $video = Video::findOrFail($video_id);
            $video->user_id = Auth::id();
            $video->video_title = $request->video_title;
            $video->video_desc = $request->video_desc;
            $video->video_link = $request->video_link;
            $video->category_id = $request->video_cat_id;
            $video->video_thumbnail = $oldimage;
            
            $video->save();
            $notification = array(
                'message' => 'Video Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.videos')->with($notification);
        }
    
    }//end update post

     //Soft Deleted post
    public function softVideo($id){
    Video::findOrFail($id)->delete();
    $notification = array(
        'message' => 'Video Trashed! you can re-store it!',
        'alert-type' => 'info'
    );

    return redirect()->route('all.videos')->with($notification);
    }
 //Trashed Posts
    public function trashedVideos(){
        $trashedVideos = Video::onlyTrashed()->get();
        return view('admin.video.trashed-videos', compact('trashedVideos'));
    }
     // Re-store Post
    public function restoreVideo($id){
        Video::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Video Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videos')->with($notification);
    }

    //Permanent Delete Post
    public function pdeleteVideo($id){
        
        Video::withTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'Video Deleted Permanently!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videos')->with($notification);
    }
}
