<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MediaCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MediaCategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('media_category.index',[
            'all_adds'=> MediaCategory::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('media_category.create',[
            'category_infos'=> Category::where('status',1)->get(),
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
            'category_name' => 'required',
            'serial' => 'required',
            'status' => 'required',
        ]);

        MediaCategory::insert([
            'category_name'=> Category::find($request->category_name)->name,
            'serial'=> $request->serial,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Media Category Added Successfully');
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
        return view('media_category.edit',[
            'target_ads'=> MediaCategory::find($id),
            'category_infos'=> Category::all(),
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
            'category_name' => 'required',
            'serial' => 'required',
            'status' => 'required',
        ]);

        MediaCategory::find($id)->update([
            'category_name'=> $request->category_name,
            'serial'=> $request->serial,
            'status'=> $request->status,
        ]);
        return back()->with('success','Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = MediaCategory::find($id);
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
        if (MediaCategory::find($id)->status == 0) {
            MediaCategory::find($id)->update([
                'status'=> 1
            ]);
        } else {
            MediaCategory::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
