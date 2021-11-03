<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Post;
use App\Models\Tags;
use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
     // Auth
     public function __construct()
     {
         $this->middleware('auth');
     }

     //All Posts
    public function allPost(){
        $allPosts = Post::latest()->orderBy('id', 'DESC')->get();
        return view('admin.post.index', compact('allPosts'));
    }

    //Create New post here
    public function createNewPost(){
        $allDivisions = Division::get();
        $allCats = Category::get();
        $allTags = Tags::all();

        
        return view('admin.post.create-new-post', compact('allCats', 'allDivisions', 'allTags'));
    }

    //GEt District under selected Division in post creation form
    public function GetDistrict($division_id){
        $getalldistricts = District::where('division_id', $division_id)->get();
        return response()->json($getalldistricts);
    }
    
    

     //Store Post
    public function storeNewPost(Request $request){
        //return $request->all();
        $request->validate([
            'post_title' => 'required',
            'post_details' => 'required',
            'category_id' => 'required',
            'image' => 'image|max:15360|dimensions:max_width=4000,max_height=3000'
        ]);

        $image = $request->file('post_thumbnail');
        
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(700,400)->save('frontend/assets/images/post/'.$name_gen);
        $save_url = 'frontend/assets/images/post/'.$name_gen;

        
        $post = Post::create([
            'user_id' => Auth::id(),
            'post_uper_title' =>$request->post_uper_title,
            'post_title' =>$request->post_title,
            'post_sub_title' =>$request->post_sub_title,
            'post_details' =>$request->post_details,
            'post_slug' =>str_replace(' ', '-', $request->post_title),
            'seo_title' =>$request->seo_title,
            'seo_descp' =>$request->seo_descp,
            'lead' =>$request->lead,
            'lead2' =>$request->lead2,
            'featured' =>$request->featured,
            'repoter_name' =>$request->repoter_name,
            'division_id' =>$request->division_id,
            'district_id' =>$request->district_id,
            'category_id' =>$request->category_id,
            'post_thumbnail' =>$save_url,
            'thumbnail_caption' =>$request->thumbnail_caption,
            'thumbnail_alt' =>$request->thumbnail_alt,
            'created_at' => Carbon::now(),
        ]);
        

        if($post){
            $tags = explode(",", implode($request->tags));
            $tagNames = [];
            if (!empty($tags)) {
                foreach ($tags as $tagName)
                {
                $tag = Tags::firstOrCreate(['name'=>$tagName,'slug'=>str_replace(' ', '-', $tagName),]);
                if($tag)
                {
                    $tagNames[] = $tag->id;
                }
                }
                
            }
            $post->tags()->sync($tagNames);
            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.posts')->with($notification);
        }else{
            return back();
        }
        

    }//end insert post

    //Edit Post
    public function editPost($news_id){
        $editPost = Post::findOrFail($news_id);
        $postDivisions = Division::get();
        $postCats = Category::get();
        $post_dist = District::get();
        $post_tags = Tags::all();
        return view('admin.post.edit-post', compact('postDivisions', 'postCats', 'editPost', 'post_dist', 'post_tags'));
    }

    //Update Post
    public function updatePost(Request $request){
        $news_id = $request->id;
       
        $image = $request->file('post_thumbnail');
                
        $oldimage = $request->oldimage;
        
       if ($image) {
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(700,400)->save('frontend/assets/images/post/'.$name_gen);
           $save_url = 'frontend/assets/images/post/' .$name_gen;
           
           if($oldimage){
            unlink($oldimage);
           }
        
            $post = Post::findOrFail($news_id);
            $post->user_id = Auth::id();
            $post->post_uper_title = $request->post_uper_title;
            $post->post_title = $request->post_title;
            $post->post_sub_title = $request->post_sub_title;
            $post->post_details = $request->post_details;
            $post->post_tags = $request->post_tags;
            $post->post_slug = $request->post_slug;
            $post->seo_title = $request->seo_title;
            $post->seo_descp = $request->seo_descp;
            $post->lead = $request->lead;
            $post->lead2 = $request->lead2;
            $post->featured = $request->featured;
            $post->repoter_name = $request->repoter_name;
            $post->division_id = $request->division_id;
            $post->district_id = $request->district_id;
            $post->category_id = $request->category_id;
            $post->post_thumbnail = $save_url;
            $post->thumbnail_caption = $request->thumbnail_caption;
            $post->thumbnail_alt = $request->thumbnail_alt;
            
            $post->save();
           if($post){
            $tags = explode(",", implode($request->tags));
            $tagNames = [];
            if (!empty($tags)) {
                foreach ($tags as $tagName)
                {
                $tag = Tags::firstOrCreate(['name'=>$tagName,'slug'=>str_replace(' ', '-', $tagName)]);
                if($tag)
                {
                    $tagNames[] = $tag->id;
                }
                }
                
            }
            
            $post->tags()->sync($tagNames);
            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.posts')->with($notification);
        }else{
            return back();
        }
       }else{
        
            $post = Post::findOrFail($news_id);
            $post->user_id = Auth::id();
            $post->post_uper_title = $request->post_uper_title;
            $post->post_title = $request->post_title;
            $post->post_sub_title = $request->post_sub_title;
            $post->post_details = $request->post_details;
            $post->post_tags = $request->post_tags;
            $post->post_slug = $request->post_slug;
            $post->seo_title = $request->seo_title;
            $post->seo_descp = $request->seo_descp;
            $post->lead = $request->lead;
            $post->lead2 = $request->lead2;
            $post->featured = $request->featured;
            $post->repoter_name = $request->repoter_name;
            $post->division_id = $request->division_id;
            $post->district_id = $request->district_id;
            $post->category_id = $request->category_id;
            $post->post_thumbnail = $oldimage;
            $post->thumbnail_caption = $request->thumbnail_caption;
            $post->thumbnail_alt = $request->thumbnail_alt;
            
            $post->save();
      
           if($post){
            $tags = explode(",", implode($request->tags));
            $tagNames = [];
            if (!empty($tags)) {
                foreach ($tags as $tagName)
                {
                $tag = Tags::firstOrCreate(['name'=>$tagName,'slug'=>str_replace(' ', '-', $tagName)]);
                if($tag)
                {
                    $tagNames[] = $tag->id;
                }
                }
                
            }
            
            $post->tags()->sync($tagNames);
            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.posts')->with($notification);
        }else{
            return back();
        }
       }
    }//end update post
 //Soft Deleted post
 public function softPost($id){
    Post::findOrFail($id)->delete();
    $notification = array(
        'message' => 'Post Trashed! you can re-store it!',
        'alert-type' => 'info'
    );

    return redirect()->route('all.posts')->with($notification);
 }

 //Trashed Posts
 public function trashedPosts(){
     $trashedPosts = Post::onlyTrashed()->get();
     return view('admin.post.trashed-posts', compact('trashedPosts'));
 }

 // Re-store Post
 public function restorePost($id){
    Post::withTrashed()->findOrFail($id)->restore();
    $notification = array(
        'message' => 'Post Re-Stored Successfully!',
        'alert-type' => 'success'
    );

    return redirect()->route('all.posts')->with($notification);
 }

 //Permanent Delete Post
public function pdeletePost($id){
    
    $post = DB::table('posts')->where('id',$id)->first();
    if($post->post_thumbnail){
    	unlink($post->post_thumbnail);
    }
    DB::table('posts')->where('id',$id)->delete();
    
    $notification = array(
        'message' => 'Post Permanently Deleted!',
        'alert-type' => 'info'
    );

    return redirect()->route('all.posts')->with($notification);
}

}//end method
