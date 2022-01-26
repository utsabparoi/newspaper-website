<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        // return Category::all();
        // die();
        return view('category.index',[
            'all_adds'=> Category::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('category.create');
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
            'serial_num' => 'required',
        ]);

        Category::insert([
            'name'=> $request->name,
            'link'=> $request->link,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'is_home'=> $request->is_home,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('success','Category Added Successfully');
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
        return view('category.edit',[
            'target_ads'=> Category::find($id),
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
            'link' =>'required',
            'serial_num' => 'required',
        ]);

        Category::find($id)->update([
            'name'=> $request->name,
            'link'=> $request->link,
            'serial_num'=> $request->serial_num,
            'status'=> $request->status,
            'is_home'=> $request->is_home,
        ]);
        return back()->with('success','Category Updated Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = Category::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Category Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $category = Category::find($id);
        if ($category->status == 0) {
            $category->update([
                'status'=> 1
            ]);
        } else {
            $category->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
