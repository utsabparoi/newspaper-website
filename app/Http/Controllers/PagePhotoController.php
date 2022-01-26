<?php

namespace App\Http\Controllers;

use App\Models\PagePhoto;
use App\Models\Page;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use App\Traits\FileSaver;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Module\Inventory\Exports\CategoryExport;

class PagePhotoController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('page-photo.index',[
            'all_adds'=> PagePhoto::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('page-photo.create',[
            'all_infos'=> Page::all(),
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
            '*'=>'required',
        ]);

        try {
            $page = PagePhoto::create([
                    'fk_page_id'=> $request->fk_page_id,
                    'photo'=> 'default.jpg',
                ]);
                $this->upload_file($request->photo, $page, 'photo', 'images/page-photo');
                // $this->uploadFileWithResize($request->photo, $page, 'photo', 'admin/img/page-photo', 850, 350);
           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

    }




    /*
    |--------------------------------------------------------------------------
    | SHOW Method for Showing one Category
    |--------------------------------------------------------------------------
    */
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
        return view('page-photo.edit',[
            'target_ads'=> PagePhoto::find($id),
            'all_infos'=> Page::all(),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating Category
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        try {
            $page = PagePhoto::find($id);

            $request->validate([
                '*'=>'required',
                'photo'=> 'nullable',
            ]);
            if($request->hasFile('photo')){
                $request->validate([
                    'photo'=> 'required|image',
                ]);
            }
            $page->update([
                'fk_page_id'=> $request->fk_page_id,
                'photo'=> $page->photo,
            ]);

            // $this->uploadFileWithResize($request->photo, $page, 'photo', 'admin/img/page-photo', 850, 350);
            $this->upload_file($request->photo, $page, 'photo', 'images/page-photo');

           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
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
        $smart_move = PagePhoto::find($id);
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
        if (PagePhoto::find($id)->status == 0) {
            PagePhoto::find($id)->update([
                'status'=> 1
            ]);
        } else {
            PagePhoto::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Status Changed!');
    }



    /*
     |--------------------------------------------------------------------------
     | CATEGORY EXPORT METHOD
     |--------------------------------------------------------------------------
    */
    // public function categoryExport()
    // {
    //     return Excel::download(new CategoryExport, 'category-collection.xlsx');
    // }
}
