<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactInfos;
use App\Models\Division;
use App\Models\District;
use App\Models\Post;
use App\Models\Page;
use App\Models\PostTag;
use App\Models\Tags;
use App\Models\User;
use App\Models\VideoCat;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $leadNews = Post::where('lead',1)->orderBy('id', 'DESC')->get();
        $leadNews2 = Post::where('lead2',1)->orderBy('id', 'DESC')->get();
        $featuredNews = Post::where('featured',1)->orderBy('id', 'DESC')->get();
        $latest = Post::orderBy('id', 'DESC')->limit(5)->get();
        $national = Category::where('category_slug','national')->first();
        $international = Category::where('category_slug','international')->first();
        $politics = Category::where('category_slug','politics')->first();
        $economics = Category::where('category_slug','economics')->first();
        $law_justice = Category::where('category_slug','law-and-justice')->first();
        $health = Category::where('category_slug','health-and-medical')->first();
        $photoGallery = Category::where('category_slug','photo-gallery')->first();
        $religion = Category::where('category_slug','religion-and-life')->first();
        $infoTech = Category::where('category_slug','information-technology')->first();
        $travel = Category::where('category_slug','travel')->first();
        $education = Category::where('category_slug','education')->first();
        $entertainment = Category::where('category_slug','entertainment')->first();
        $sports = Category::where('category_slug','sports')->first();
        $specialReport = Category::where('category_slug','special-report')->first();
        $mstview = Post::orderBy('view_count', 'desc')->take(5)->get();
        $videos = Video::latest()->orderBy('id', 'DESC')->get();

        return view('frontend.index', compact('leadNews', 'leadNews2', 'featuredNews', 'latest', 'national', 'health', 'photoGallery', 'specialReport', 'international', 'mstview','politics', 'economics', 'law_justice','religion','infoTech','travel', 'education', 'entertainment','sports', 'videos'));
    }

    public function singleNews($id,$post_slug){
        $post = Post::with('category', 'user')->where('id', $id)->where('post_slug', $post_slug)->first();
        $post->view_count++;
        $post->save();
        $relatedNews = Post::where('category_id',$post->category_id)->orderBy('id','DESC')->limit(8)->get();
        $latest = Post::orderBy('id', 'DESC')->limit(10)->get();
        $mstview = Post::orderBy('view_count', 'desc')->take(5)->get();
        return view('frontend.body.pages.single', compact('post', 'relatedNews', 'latest', 'mstview'));
    }

    public function catWiseNews($category_slug){
        $category = Category::where('category_slug', $category_slug)->first();
        $catWiseNews = Post::where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(12);
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.body.pages.category', compact('category', 'catWiseNews', 'latestPost'));

    }
    public function tagWiseNews($slug){
        $tag = Tags::where('slug', $slug)->first();
        $tagWiseNews = $tag->posts()->orderBy('id', 'DESC')->paginate(12);
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.body.pages.tag-news', compact('tag', 'tagWiseNews', 'latestPost'));

    }

    //Division News
    public function divisionNews($division_slug){
        $division = Division::where('division_slug', $division_slug)->first();
        $divisionNews = Post::where('division_id', $division->id)->orderBy('id', 'DESC')->paginate(12);
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.body.pages.division', compact('division', 'divisionNews','latestPost'));

    }

    //District News
    public function districtNews($district_slug){
        $district = District::where('district_slug', $district_slug)->first();
        $districtNews = Post::where('district_id', $district->id)->orderBy('id', 'DESC')->paginate(12);
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.body.pages.district', compact('district', 'districtNews','latestPost'));

    }

    //User News
    public function userNews($user_id){
        $user = User::where('id',$user_id)->first();
        $userNews = Post::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(12);
        return view('frontend.body.pages.usernews', compact('userNews','user'));
    }

    //========== Videos ============//
    public function singleVideo($id){
        $video = Video::where('id', $id)->first();
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        $videos = Video::all();

        return view('frontend.body.pages.single-video', compact('video', 'latestPost', 'videos'));
    }

     public function catWisVideos($category_slug){
        $videocat = VideoCat::where('category_slug', $category_slug)->first();
        $catWiseVideos = Video::where('category_id', $videocat ->id)->orderBy('id', 'DESC')->paginate(12);

        return view('frontend.body.pages.videoCategory', compact('videocat', 'catWiseVideos'));

    }


    //About Page
    public function about(){
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        $page = Page::where('slug', 'about')->first();

        if($page){
            return view('frontend.body.pages.about', compact('latestPost','page'));
        }else {
            return redirect('/');
        }

    }

    //contact page
    public function userContact(){
        $contactInfos = ContactInfos::first();
        return view('frontend.body.pages.contact-us', compact('contactInfos'));
    }

    //Privacy Page
    public function privacy(){
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        $page = Page::where('slug', 'privacy')->first();

        if($page){
            return view('frontend.body.pages.privacy', compact('latestPost','page'));
        }else {
            return redirect('/');
        }

    }

    //live tv
    public function live(){
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        $liveTV = Page::where('slug', 'live')->first();

        if($liveTV){
            return view('frontend.body.pages.live', compact('latestPost','liveTV'));
        }else {
            return redirect('/');
        }

    }

    //Contribute Page
    public function contribute(){
        $latestPost = Post::orderBy('id', 'DESC')->limit(10)->get();
        $contribute = Page::where('slug', 'contribute')->first();

        if($contribute){
            return view('frontend.body.pages.contribute', compact('latestPost','contribute'));
        }else {
            return redirect('/');
        }

    }


}
