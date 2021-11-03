<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Collection;


class AdminController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Admin Logout
    public function adminLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
    //live tv
     public function liveTvSettings(){
        $livetv = DB::table('livetv')->first();
        return view('admin.theme-options.live-tv', compact('livetv'));
    }

    public function LiveTvUpdate(Request $request, $id){

        $data = array();
          $data['livevideo'] = $request->livevideo;
          
          DB::table('livetv')->where('id',$id)->update($data);
 
          $notification = array(
              'message' => 'Live TV Updated Successfully',
              'alert-type' => 'success'
          );
 
          return Redirect()->route('tv.setting')->with($notification);
    }


    //Google Analytics
    public function googleAnalytics(){
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        return view('admin.analytics.analytics', compact('analyticsData'));
    }
    
}
