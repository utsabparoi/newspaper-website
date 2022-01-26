<?php

namespace App\Http\Controllers;

use App\Models\AdsManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdsManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdManagement
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('ad_management.index',[
            'all_adds'=> AdsManagement::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdManagement
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('ad_management.create');
    }




    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into AdManagement
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'script' => 'required',
            'position_id' => 'required',
            'serial_num' => 'required',
        ]);

        AdsManagement::insert([
            'script'=> $request->script,
            'position_id'=> $request->position_id,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Ads Added Successfully');
    }




    public function show($id)
    {
        //
    }




    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the AdManagement
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('ad_management.edit',[
            'target_ads'=> AdsManagement::find($id),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdManagement
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'script' => 'required',
            'serial_num' => 'required',
        ]);

        AdsManagement::find($id)->update([
            'script'=> $request->script,
            'position_id'=> $request->position_id,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
        ]);
        return back()->with('success','Ads Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdManagement
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = AdsManagement::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Ads Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdManagement
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (AdsManagement::find($id)->status == 0) {
            AdsManagement::find($id)->update([
                'status'=> 1
            ]);
        }
        else {
            AdsManagement::find($id)->update([
                'status'=> 0
            ]);
        }
    }
    // ====================================================================
    // public function changestatus($id)
    // {
    //     $var = AdsManagement::find($id);

    //     $var->status == 0 ? $val1 : $val0;

    //     $val1->update(['status'=> 1]);
    //     $val0->update(['status'=> 0]);
    // }


    /*
    |--------------------------------------------------------------------------
    | LOAD MAX SERIAL METHOD
    |--------------------------------------------------------------------------
    */
    public function load_max_serial($id)
    {
         $max_serial=AdsManagement::where('position_id',$id)->max('serial_num');

         return view('backend.adsmanagement.loadSerialno',compact('max_serial'));



    }
}
