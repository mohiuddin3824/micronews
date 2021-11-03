<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //Get all sub menus
    public function subMenu(){
        $submenus = SubMenu::orderBy('menu_item_id', 'ASC')->paginate(30);
        return view('admin.submenu.index', compact('submenus'));
    }
    //Create New Menu
    public function createSubMenu(){
        $menus = Menu::where('status',1)->get();
        return view('admin.submenu.create', compact('menus'));
    }

    //Store Sub Menu
    public function storeSubMenu(Request $request){
        $request->validate([
            'name' => 'required|unique:sub_menus,name',
            'link' => 'required',
            'menu_item_id' => 'required',
            'status' => 'required',
            'position' => 'required|integer',
        ]);

        SubMenu::insert([
            'name' =>$request->name,
            'link' =>$request->link,
            'menu_item_id' =>$request->menu_item_id,
            'status' =>$request->status,
            'position' =>$request->position,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub Menu Item Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sub.menu')->with($notification);
    }

    //Edit sub Menu
    public function editSubMenu($submenu_id){
        $menus = Menu::where('status',1)->get();
        $submenus = SubMenu::findOrFail($submenu_id);
        return view('admin.submenu.edit', compact('submenus', 'menus'));

    }

    //Update Submenu Item
    public function updateSubMenu(Request $request){
        $submenu_id = $request->id;
        SubMenu::findOrFail($submenu_id)->update([
            'name' =>$request->name,
            'link' =>$request->link,
            'menu_item_id' =>$request->menu_item_id,
            'status' =>$request->status,
            'position' =>$request->position,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub Menu Item Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sub.menu')->with($notification);
    }

    //delete Sub menu item
    public function deleteSubMenu($id){
        SubMenu::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Sub Menu Item Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('sub.menu')->with($notification);
    }
}
