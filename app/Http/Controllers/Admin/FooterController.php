<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FooterController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function footerSettings(){
        $footers = Footer::first();
        return view('admin.theme-options.footer-settings',compact('footers'));
    }

    public function footerUpdate(Request $request){
        $foot_id = $request->id;
        $image = $request->file('footer_logo');    
        $old_img = $request->oldimage;

        
        
        
        if($image){
            $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('frontend/assets/images/logos/'.$name_gen);
            $save_url = 'frontend/assets/images/logos/'.$name_gen;
            if($old_img){
                unlink($old_img);
            }
            $footer = Footer::findOrFail($foot_id);
            $footer->footer_logo = $save_url;
            $footer->footer_disclaimer =$request->footer_disclaimer;
            $footer->footer_menu_link1 =$request->footer_menu_link1;
            $footer->footer_menu_link2 =$request->footer_menu_link2;
            $footer->footer_menu_link3 =$request->footer_menu_link3;
            $footer->footer_menu_link4 =$request->footer_menu_link4;
            $footer->footer_menu_link5 =$request->footer_menu_link5;
            $footer->footer_menu_link6 =$request->footer_menu_link6;
            $footer->footer_menu_link7 =$request->footer_menu_link7;
            $footer->footer_menu_link8 =$request->footer_menu_link8;
            $footer->footer_menu_link9 =$request->footer_menu_link9;
            $footer->fb =$request->fb;
            $footer->footer_font =$request->footer_font;
            $footer->save();

            $notification = array(
                'message' => 'Footer Updated Successfully',
                'alert-type' => 'success'
            );
              return Redirect()->route('footer.settings')->with($notification);
        }else{
            $footer = Footer::findOrFail($foot_id);
            $footer->footer_logo = $old_img;
            $footer->footer_disclaimer =$request->footer_disclaimer;
            $footer->footer_menu_link1 =$request->footer_menu_link1;
            $footer->footer_menu_link2 =$request->footer_menu_link2;
            $footer->footer_menu_link3 =$request->footer_menu_link3;
            $footer->footer_menu_link4 =$request->footer_menu_link4;
            $footer->footer_menu_link5 =$request->footer_menu_link5;
            $footer->footer_menu_link6 =$request->footer_menu_link6;
            $footer->footer_menu_link7 =$request->footer_menu_link7;
            $footer->footer_menu_link8 =$request->footer_menu_link8;
            $footer->footer_menu_link9 =$request->footer_menu_link9;
            $footer->fb =$request->fb;
            $footer->footer_font =$request->footer_font;
            $footer->save();

            $notification = array(
                'message' => 'Footer Updated Successfully',
                'alert-type' => 'success'
            );
              return Redirect()->route('footer.settings')->with($notification);
        }

        

        
    }
}
