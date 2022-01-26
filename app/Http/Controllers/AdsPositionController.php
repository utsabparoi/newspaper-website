<?php

namespace App\Http\Controllers;

use App\Models\AdsPosition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdsPositionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdPosition
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('ad_position.index',[
            'all_adds'=> AdsPosition::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdPosition
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('ad_position.create');
    }




    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into AdPosition
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        AdsPosition::insert([
            'position_name'=> $request->position_name,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Ads Position Added Successfully');
    }




    public function show($id)
    {
        //
    }




    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the AdPosition
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('ad_position.edit',[
            'target_ads'=> AdsPosition::find($id),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating AdPosition
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        AdsPosition::find($id)->update([
            'position_name'=> $request->position_name,
            'status'=> $request->status,
        ]);
        return back()->with('success','Ads Position Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdPosition
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = AdsPosition::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Ads position Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting AdPosition
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (AdsPosition::find($id)->status == 0) {
            AdsPosition::find($id)->update([
                'status'=> 1
            ]);
        } else {
            AdsPosition::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
