<?php

namespace App\Http\Controllers;

use App\Models\AllMedia;
use App\Models\Category;
use App\Models\MediaCategory;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

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

        return view('backend.all-media.index',[
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
        return view('backend.all-media.create',[
            'category_infos'=> MediaCategory::where('status',1)->get(),
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

           $this->upload_file($request->photo, $all_media, 'photo', 'uploads/all-media');

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
        return view('backend.all-media.edit',[
            'target_ads'=> AllMedia::find($id),
            'category_infos'=> MediaCategory::where('status',1)->get(),
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
                    'photo'=> 'required',
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

            $this->upload_file($request->photo, $all_media, 'photo', 'uploads/all-media');

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


}
