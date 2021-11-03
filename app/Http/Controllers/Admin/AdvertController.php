<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AdvertController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All Adverts
    public function index(){
        $allAds = Advert::get();
        return view('admin.ads.index', compact('allAds'));
    }

    //Create Advert
    public function createAd(){
        return view('admin.ads.create');
    }
    
    //Store Advert
    public function storeAd(Request $request){
        // return $request;
        $request->validate([
            'ad_name' => 'required',
        ]);
    
        Advert::insert([
            'ad_name' => $request->ad_name,
            'ad_link' => $request->ad_link,
            'ad_code' => $request->ad_code,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        

        $notification = array(
            'message' => 'Ad Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.adverts')->with($notification);
    }


    public function editAd($ad_id){
        $editAd = Advert::findOrFail($ad_id);
        return view('admin.ads.edit', compact('editAd'));
    }


    public function updateAd(Request $request){
        $ad_id = $request->id;      

        Advert::findOrFail($ad_id)->update([
            'ad_name' => $request->ad_name,
            'ad_link' => $request->ad_link,
            'ad_code' => $request->ad_code,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
    
        $notification = array(
            'message' => 'Ad Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.adverts')->with($notification);

    } 

    //Permanent Delete Advert
    public function deleteAdvert($id){
        Advert::where('id',$id)->delete();
        $notification = array(
            'message' => 'Advert Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.adverts')->with($notification);
    }
}
