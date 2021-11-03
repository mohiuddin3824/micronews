<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HeaderController extends Controller
{
    //

    public function headerSettings(){
        $headers = Header::first();
        return view('admin.theme-options.header-settings',compact('headers'));
    }

    public function headerUpdate(Request $request){
        $head_id= $request->id;

        $logo = $request->file('header_logo');    
        $old_logo = $request->old_main_logo;
        
        $mlogo = $request->file('mobile_logo');    
        $old_mlogo = $request->old_mobile_logo;
        
        $favicon = $request->file('favicon'); 
        $old_fav = $request->old_fav;
        
            if($logo){
            	$name_gen=uniqid().'.'.$logo->getClientOriginalExtension();
	            Image::make($logo)->save('frontend/assets/images/logos/'.$name_gen);
	            $save_logo = 'frontend/assets/images/logos/'.$name_gen;
	            if($old_logo){
	                unlink($old_logo);
	            }
	            
	            Header::findOrFail($head_id)->update([
	                'header_logo' =>$save_logo,
	                
	            ]);

            }elseif($mlogo){
            	$name_gen=uniqid().'.'.$mlogo->getClientOriginalExtension();
	            Image::make($mlogo)->save('frontend/assets/images/logos/'.$name_gen);
	            $save_mlogo = 'frontend/assets/images/logos/'.$name_gen;
	            if($old_mlogo){
	                unlink($old_mlogo);
	            }
	            
	            Header::findOrFail($head_id)->update([
	                'mobile_logo' =>$save_mlogo,
	                
	            ]);
            }else{
            $name_gen=uniqid().'.'.$favicon ->getClientOriginalExtension();
            Image::make($favicon)->save('frontend/assets/images/logos/'.$name_gen);
            $save_fav = 'frontend/assets/images/logos/'.$name_gen;
            if($old_fav){
                unlink($old_fav);
            }
            
            Header::findOrFail($head_id)->update([
                'favicon' =>$save_fav,
               
            ]);

            }        
        $notification = array(
            'message' => 'Settings Updated Successfully',
            'alert-type' => 'success'
        );
          return Redirect()->route('header.settings')->with($notification);
    }
}
