<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DivisionController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //All Divisions
    public function divisions(){
        $divisions = Division::latest()->orderBy('id', 'DESC')->get();
        return view('admin.division.index', compact('divisions'));
    }

    //Create Divison
    public function createDivision(){
        return view('admin.division.create-division');
    }

    //Store Division
    public function storeDivision(Request $request){
        $request->validate([
            'division_name' => 'required',
            'division_slug' => 'required',
        ]);

        Division::insert([
            'division_name' =>$request->division_name,
            'division_slug' =>$request->division_slug,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('divisions')->with($notification);
    }

    //edit store
    public function editDivisions($div_id){
        $division =  Division::find($div_id);
        return view('admin.division.edit-division', compact('division'));
    }

    //Update Divisoin
    public function updateDivisions(Request $request){
        $div_id = $request->id;
        Division::findOrFail($div_id)->update([
            'division_name' =>$request->division_name,
            'division_slug' =>$request->division_slug,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('divisions')->with($notification);
    }

    //Soft Delete Division
    public function deleteDivisions($id){
        Division::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Divisoin Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('divisions')->with($notification);
    }

    //Trashed Visions
    public function trashedDivisions(){
        $trashedDivs = Division::onlyTrashed()->get();
        return view('admin.division.trashed-divisions', compact('trashedDivs'));
    }

    //restore trashed divisions
    public function restoreDivisions($id){
        Division::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Divisoin Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('divisions')->with($notification);
    }


    //Permanent Delete Division
    public function pDeleteDivisions($id){
        Division::onlyTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'Divisoin Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('trashed.divison')->with($notification);
    }
}
