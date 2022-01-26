<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.social-links.index',[
            'all_adds'=> SocialLink::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.social-links.create');
    }




    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'link' => 'required|url',
            'icon_class' => 'required',
        ]);

        SocialLink::insert([
            'name'=> $request->name,
            'link'=> $request->link,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'icon_class'=> $request->icon_class,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success',' Added Successfully');
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
        return view('backend.social-links.edit',[
            'target_ads'=> SocialLink::find($id),
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
            'name' => 'required',
            'link' => 'required|url',
            'icon_class' => 'required',
        ]);

        SocialLink::find($id)->update([
            'name'=> $request->name,
            'link'=> $request->link,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'icon_class'=> $request->icon_class,
        ]);
        return back()->with('success',' Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = SocialLink::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Ads position Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (SocialLink::find($id)->status == 0) {
            SocialLink::find($id)->update([
                'status'=> 1
            ]);
        } else {
            SocialLink::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Ads Status Changed!');
    }
}
