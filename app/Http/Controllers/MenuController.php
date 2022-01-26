<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('menu.index',[
            'all_adds'=> Menu::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('menu.create');
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

        Menu::insert([
            'name'=> $request->name,
            'url'=> $request->url,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Menu Added Successfully');
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
        return view('menu.edit',[
            'target_ads'=> Menu::find($id),
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

        Menu::find($id)->update([
            'name'=> $request->name,
            'url'=> $request->url,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
        ]);
        return back()->with('success','Menu Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = Menu::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Menu position Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (Menu::find($id)->status == 0) {
            Menu::find($id)->update([
                'status'=> 1
            ]);
        } else {
            Menu::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Menu Status Changed!');
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE METHOD
    |--------------------------------------------------------------------------
    */
    public function page(){
        $max_serial=Menu::max('serial_num');
        $page=Page::where('status',1)->pluck('name','link');
        return view('backend.menu.pageMenu',compact('max_serial','page'));
    }
}
