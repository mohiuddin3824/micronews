<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\ContactInfos;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    
    //Contact Infor
    public function reachUs(){
        $cinfos = ContactInfos::first();
        return view('admin.theme-options.contact-info', compact('cinfos'));
    }

    //Contact Information update
    public function contactUpdadte(Request $request){
        $contact_id=$request->id;
        ContactInfos::findOrFail($contact_id)->update([
            'location' =>$request->location,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'gmap' =>$request->gmap,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Contact Information Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function userContactForm(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->route('user.cform')->with('success','Your Message Sent Successfully');

    }

    //Admin Message
    public function adminMessage(){
        $message = ContactForm::all();
        return view('admin.mailbox.index', compact('message'));
    }
    
    //Admin View Message
    public function viewMessage($msg_id){
        $viewMessage = ContactForm::where('id', $msg_id)->first();
        return view('admin.mailbox.view-msg', compact('viewMessage'));
    }
    //Admin Deletew Message
    public function deleteMessage($id){
        ContactForm::where('id', $id)->delete();
        $notification = array(
            'message' => 'Message Permanently Deleted!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.message')->with($notification);
    }
    
}
