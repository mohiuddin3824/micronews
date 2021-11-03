<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    //Social medida links
    public function socialLinks(){
        $socials = DB::table('socials')->first();
        return view('admin.theme-options.social-links', compact('socials'));
    }

    public function SocialUpdate(Request $request, $id){

        $data = array();
          $data['facebook'] = $request->facebook;
          $data['twitter'] = $request->twitter;
          $data['instagram'] = $request->instagram;
          $data['youtube'] = $request->youtube;
          $data['linkedin'] = $request->linkedin;
          DB::table('socials')->where('id',$id)->update($data);
 
          $notification = array(
              'message' => 'Social Links Updated Successfully',
              'alert-type' => 'success'
          );
 
          return Redirect()->route('social.links')->with($notification);
    }
}
