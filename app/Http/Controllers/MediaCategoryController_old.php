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
        return view('backend.media_category.index',[
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
        return view('backend.media_category.create',[
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
            'serial'        => 'required',
            'status'        => 'required',
        ]);

        try {
            MediaCategory::insert([
                'category_name'=> Category::find($request->category_name)->name,
                'serial'=> $request->serial,
                'status'=> $request->status == 'on' ? 1 : 0,
                'created_at'=> Carbon::now(),
            ]);
            return back()->with('success','Media Category Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

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
        // dd(MediaCategory::find($id));
        return view('backend.media_category.edit',[
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

        try {
            MediaCategory::find($id)->update([
                'category_name'=> $request->category_name,
                'serial'=> $request->serial,
                'status'=> $request->status == 'on' ? 1 : 0,
            ]);
            return back()->with('success','Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }


    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $smart_move = MediaCategory::find($id);
            $smart_move->update([
                'status'=> 0,
            ]);
            $smart_move->delete();
            return back()->with('deleted','Sub Category Deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }



    /*
    |--------------------------------------------------------------------------
    | Status Change of Media Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        $media_cat = MediaCategory::find($id);
        if ($media_cat->status == 0) {
            $media_cat->update([
                'status'=> 1
            ]);
        } else {
            $media_cat->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }
}
