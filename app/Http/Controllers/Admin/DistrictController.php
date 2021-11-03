<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DistrictController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    //get all districts
    public function districts(){
        $districts = District::latest()->orderBy('id', 'DESC')->get();
        return view('admin.district.index', compact('districts'));
    }

    //Create Districts
    public function createDistrict(){
        $holyalldivisions = Division::get();
        return view('admin.district.create', compact('holyalldivisions'));
    }

    public function storeDistrict(Request $request){
        $request->validate([
            'district_name' => 'required|unique:districts|max:255',
            'district_slug' => 'required|unique:districts',
            'division_id' => 'required',
        ]);

        District::insert([
            'division_id' => $request->division_id,
            'district_name' =>$request->district_name,
            'district_slug' => $request->district_slug,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('districts')->with($notification);
    }

    //Edit District
    public function editDistrict($dis_id){
        $getallDivisions = Division::get();
        $allDistricts = District::findOrFail($dis_id);
        return view('admin.district.edit', compact('getallDivisions', 'allDistricts'));
    }

    //Update District
    public function updateDistrict(Request $request){
        $dis_id = $request->id; 

        District::findOrFail($dis_id)->update([
            'division_id' => $request->division_id,
            'district_name' =>$request->district_name,
            'district_slug' => $request->district_slug,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('districts')->with($notification);
    }

    //Soft Delete District
    public function deleteDistrict($id){
        District::find($id)->delete();
        
        $notification = array(
            'message' => 'District Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('districts')->with($notification);
    }


     //Trashed Sub Districts
     public function trashedDistrict(){
        $trashDists = District::onlyTrashed()->get();
        return view('admin.district.trashed', compact('trashDists'));
    }
    
     //Restore District
     public function restoreDistrict($id){
        District::withTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'District Re-Stored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('trashed.district')->with($notification);
    }

    //Permanent Delete District
    public function pDeleteDistrict($id){
        District::onlyTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'District Deleted Permanently!',
            'alert-type' => 'info'
        );

        return redirect()->route('trashed.district')->with($notification);
    }
}
