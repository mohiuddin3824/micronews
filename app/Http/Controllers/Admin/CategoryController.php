<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
     // Auth
     public function __construct()
     {
         $this->middleware('auth');
     }

    //Get categories
    public function categories(){
        $categories = Category::latest()->orderBy('id', 'ASC')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function createCategory(){
        return view('admin.category.create-category');
    }

     public function storeCategory(Request $request){
         $request->validate([
             'category_name' => 'required|unique:categories|max:255',
             'category_slug' => 'required|unique:categories,category_slug|max:191',
         ]);
         $image = $request->file('category_bg');

        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('frontend/assets/images/bg/'.$name_gen);
        $save_url = 'frontend/assets/images/bg/'.$name_gen;

         Category::create([
             'category_name' =>$request->category_name,
             'category_slug' =>$request->category_slug,
             'category_desc' =>$request->category_desc,
             'category_title' =>$request->category_title,
             'category_bg' =>$save_url,
             'created_at' => Carbon::now(),
         ]);

         $notification = array(
             'message' => 'Category Added Successfully',
             'alert-type' => 'success'
         );

         return redirect()->route('all.categories')->with($notification);
     }

     public function editCategory($cat_id){
        $category = Category::findOrFail($cat_id);
        return view('admin.category.edit', compact('category'));
    }

    //Update Category
    public function updateCategory(Request $request){
        $cat_id = $request->id;
        $image = $request->file('category_bg');

        $oldimage = $request->oldimage;

        if($image){
            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('frontend/assets/images/bg/'.$name_gen);
            $save_url = 'frontend/assets/images/bg/'.$name_gen;

            if($oldimage){
                unlink($oldimage);
               }

            $cat = Category::findOrFail($cat_id);
            $cat->category_name = $request->category_name;
            $cat->category_slug = $request->category_slug;
            $cat->category_desc = $request->category_desc;
            $cat->category_title = $request->category_title;
            $cat->category_bg = $save_url;
            $cat->save();

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.categories')->with($notification);
        }else{

            $cat = Category::findOrFail($cat_id);
            $cat->category_name = $request->category_name;
            $cat->category_slug = $request->category_slug;
            $cat->category_desc = $request->category_desc;
            $cat->category_title = $request->category_title;
            $cat->category_bg = $oldimage;
            $cat->save();

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.categories')->with($notification);
        }
    }


    //SoftDdelete Category
    public function softDeleteCategory($id){
        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.categories')->with($notification);
    }

    //Trashed Category
    public function trashedCategory(){
        $trashCats = Category::onlyTrashed()->get();
        return view('admin.category.category-trashed', compact('trashCats'));
    }

    //Restore Category
    public function reStoreCategory($id){
        Category::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Category Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);
    }

    //Permanent Delete Category
    public function pDeleteCategory($id){
        $cat = DB::table('categories')->where('id',$id)->first();
        if($cat->category_bg){
            unlink($cat->category_bg);
        }
        DB::table('categories')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    // Category news for admin dashboard
    public function adminCatWiseNews($category_slug){
        $category = Category::where('category_slug', $category_slug)->first();
        $catWiseNews = Post::where('category_id', $category->id)->orderBy('id', 'DESC')->take(10)->get();
        $AuthCatWiseNews = Post::where('category_id', $category->id)->where('user_id', Auth::id())->orderBy('id', 'DESC')->take(10)->get();

        return view('admin.category.category-posts', compact('category', 'catWiseNews', 'AuthCatWiseNews'));

    }
}
