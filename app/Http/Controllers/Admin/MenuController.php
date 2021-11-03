<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Get all menus
    public function primaryMenu(){
        $menus = Menu::orderBy('position', 'ASC')->paginate(12);
        return view('admin.menu.index', compact('menus'));
    }

    //Create New Menu
    public function createMenu(){
        return view('admin.menu.create');
    }

    public function storeMenu(Request $request){
        $request->validate([
            'name' => 'required|unique:menus,name',
            'link' => 'required',
            'status' => 'required',
            'position' => 'required|integer',
        ]);

        Menu::insert([
            'name' =>$request->name,
            'link' =>$request->link,
            'status' =>$request->status,
            'position' =>$request->position,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Menu Item Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('primary.menu')->with($notification);
    }

    //edit menu
    public function editMenu($menu_id){
        $menu = Menu::findOrFail($menu_id);
        return view('admin.menu.edit', compact('menu'));
    }

    //update menu controller
    public function updateMenu(Request $request){
        $menu_id = $request->id;
        Menu::findOrFail($menu_id)->update([
            'name' =>$request->name,
            'link' =>$request->link,
            'status' =>$request->status,
            'position' =>$request->position,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Menu Item Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('primary.menu')->with($notification);
    }

    //delete menu item
    public function deleteMenu($id){
        Menu::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Menu Item Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('primary.menu')->with($notification);
    }
}
