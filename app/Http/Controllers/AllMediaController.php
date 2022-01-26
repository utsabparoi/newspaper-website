<?php

namespace App\Http\Controllers;

use App\Models\AllMedia;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\FileSaver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class AllMediaController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        // return AllMedia::all();
        // die();
        return view('all-media.index',[
            'all_adds'=> AllMedia::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('all-media.create',[
            'category_infos'=> Category::all(),
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
            'serial_number' => 'required',
            'fk_category_id' => 'required',
            'media_name' => 'required',
            'media_link' => 'required',
            'photo' => 'required',
            'status' => 'required',
        ]);

        try {
            $all_media = AllMedia::create([
                'serial_number'=> $request->serial_number,
                'fk_category_id'=> $request->fk_category_id,
                'media_name'=> $request->media_name,
                'media_link'=> $request->media_link,
                'status'=> $request->status,
                'photo'=> 'default.jpg',
            ]);

        //    $this->uploadFileWithResize($request->photo, $all_media, 'photo', 'admin/img/all-media-pic', 110, 50);
           $this->upload_file($request->photo, $all_media, 'photo', 'images/all-media-pic');

           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
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
        return view('all-media.edit',[
            'target_ads'=> AllMedia::find($id),
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
            'serial_number' => 'required',
            'fk_category_id' => 'required',
            'media_name' => 'required',
            'media_link' => 'required',
            'status' => 'required',
        ]);

            if($request->hasFile('photo')){
                $request->validate([
                    'photo'=> 'required|image',
                ]);
            }

            try {
                $all_media = AllMedia::find($id);

                $all_media->update([
                    'serial_number'=> $request->serial_number,
                    'fk_category_id'=> $request->fk_category_id,
                    'media_name'=> $request->media_name,
                    'media_link'=> $request->media_link,
                    'status'=> $request->status,
                    'photo'=> $all_media->photo,
                ]);

            // $this->uploadFileWithResize($request->photo, $all_media, 'photo', 'admin/img/all-media-pic', 110, 50);
            $this->upload_file($request->photo, $all_media, 'photo', 'images/all-media-pic');

            return back()->with('success','Data Added Successfully');

            }
            catch(\Exception $ex) {
                return redirect()->back()->withError($ex->getMessage());
            }
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = AllMedia::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (AllMedia::find($id)->status == 0) {
            AllMedia::find($id)->update([
                'status'=> 1
            ]);
        } else {
            AllMedia::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Ads Status Changed!');
    }



    /*
    |--------------------------------------------------------------------------
    | Get Sub Category Method for getting sub Category info
    |--------------------------------------------------------------------------
    */
    // public function getsubcat_method(Request $request)
    // {
    //     $show_cat = "<option value=''>-Select a Sub Category-</option>";
    //     foreach (SubCategory::where('fk_category_id',$request->catx_id)->get(['id','name']) as $subcat_data) {
    //         $show_cat .= "<option value='$subcat_data->id'>$subcat_data->name</option>";
    //     }
    //    echo $show_cat;
    // }



}
