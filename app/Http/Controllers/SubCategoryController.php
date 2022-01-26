<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('subcategory.index',[
            'all_adds'=> SubCategory::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('subcategory.create',[
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
            'name' => 'required|unique:category',
            'link' =>'required|unique:category',
        ]);

        SubCategory::insert([
            'name'=> $request->name,
            'link'=> $request->link,
            'fk_category_id'=> $request->fk_category_id,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Sub Category Added Successfully');
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
        return view('subcategory.edit',[
            'target_ads'=> SubCategory::find($id),
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
            'name' => 'required',
        ]);

        SubCategory::find($id)->update([
            'name'=> $request->name,
            'link'=> $request->link,
            'fk_category_id'=> $request->fk_category_id,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
        ]);
        return back()->with('success','Sub Category Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = SubCategory::find($id);
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
        if (SubCategory::find($id)->status == 0) {
            SubCategory::find($id)->update([
                'status'=> 1
            ]);
        } else {
            SubCategory::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Sub Category Status Changed!');
    }
}
