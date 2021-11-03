<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Seocontroller extends Controller
{
     //
     public function seoSettings(){
        $seos = DB::table('s_e_o_s')->first();
        return view('admin.theme-options.seo-settings', compact('seos'));
    }

    public function SeoUpdate(Request $request, $id){

        $data = array();
          $data['meta_author'] = $request->meta_author;
          $data['meta_title'] = $request->meta_title;
          $data['meta_description'] = $request->meta_description;
          $data['meta_keywords'] = $request->meta_keywords;
          $data['google_analytics'] = $request->google_analytics;
          $data['google_verification'] = $request->google_verification;
          $data['baidu_verification'] = $request->baidu_verification;
          $data['yandex_verification'] = $request->yandex_verification;
          DB::table('s_e_o_s')->where('id',$id)->update($data);
 
          $notification = array(
              'message' => 'Seo Settings Updated Successfully',
              'alert-type' => 'success'
          );
 
          return Redirect()->route('seo.setting')->with($notification);
    }
}
