<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.submenu.index',[
            'all_adds'=> SubMenu::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.submenu.create',[
            'menu_infos' => Menu::where('status',1)->get(),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'url' => 'required',
        ]);

        SubMenu::insert([
            'name'=> $request->name,
            'url'=> $request->url,
            'fk_menu_id'=> $request->fk_menu_id,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Sub Menu Added Successfully');
    }




    public function show($id)
    {
        //
    }




    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('backend.submenu.edit',[
            'target_ads'=> SubMenu::find($id),
            'menu_infos'=> Menu::all(),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating Category
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'url' => 'required',
        ]);

        SubMenu::find($id)->update([
            'name'=> $request->name,
            'url'=> $request->url,
            'fk_category_id'=> $request->fk_category_id,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
        ]);
        return back()->with('success','SubCategory Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = SubMenu::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Sub Category Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (SubMenu::find($id)->status == 0) {
            SubMenu::find($id)->update([
                'status'=> 1
            ]);
        } else {
            SubMenu::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Sub Category Status Changed!');
    }
}
